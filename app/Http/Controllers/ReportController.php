<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Models\Reporter;
use App\Models\Category;
use App\Models\ReportTracker;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Spatie\Activitylog\Models\Activity;
use RealRashid\SweetAlert\Facades\Alert;

use App\DataTables\ReportsDataTable;

class ReportController extends Controller
{

    public function index(ReportsDataTable $dataTable)
    {
        return $dataTable->render('reports.index');
    }

    public function store(ReportRequest $request)
    {
        $reporterData = $request->validated();

        $existingReporter = Reporter::where('email', $reporterData['email'])->first();

        if (!$existingReporter) {
            $reporter = new Reporter($reporterData);
            $reporter->save();
        } else {
            $reporter = $existingReporter;
        }

        $reporter = Reporter::where('email', $reporterData['email'])->first();
        $reportData = $request->validated();

        $report = new Report($reportData);
        $report->reporter_id = $reporter->id;
        $report->ticket_id = $this->generateTicketId();
        $report->save();

        if ($request->hasFile('report_proof') && $request->file('report_proof')->isValid()) {
            $media = $report->addMediaFromRequest('report_proof')->toMediaCollection('report_proof');
        }

        Alert::success('Terima kasih!', 'Laporan kamu sudah kami terima. ID Ticket kamu: ' . $report->ticket_id)->autoClose(false);
        // Alert::toast('Your message here', 'success')->autoClose(false);
        return redirect()->route('reports.create');
    }

    private function generateTicketId()
    {
        $date = now()->format('Ymd');

        $maxTicketId = Report::where('ticket_id', 'like', $date . '%')->max('ticket_id');

        $numericPart = intval(substr($maxTicketId, -5));
        $numericPart++;

        $numericPartString = str_pad($numericPart, 5, '0', STR_PAD_LEFT);

        $ticketId = $date . $numericPartString;

        return $ticketId;
    }

    public function verify($id)
    {
        $report = Report::findOrFail($id);
        $categories = Category::all(); 
        return view('reports.verify', compact('report', 'categories'));
    }

    public function update(Request $request, Report $report)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'category' => 'required|exists:categories,id',
            'note' => 'nullable|string'
        ]);

        $report->update([
            'status' => $validatedData['status'],
            'category_id' => $validatedData['category'],
        ]);

        $reportTracker = new ReportTracker([
            'user_id' => Auth::user()->id,
            'report_id' => $report->id,
            'status' => $validatedData['status'],
            'note' => $validatedData['note'],
        ]);

        $reportTracker->save();

        return redirect()->route('reports.index');
    }

    public function log(Report $report){
        return view('reports.log',[
            'logs' => Activity::where('subject_type',Report::class)->where('subject_id',$report->id)->latest()->get()
        ]);
    }

    public function track(Request $request)
    {
        $ticketId = $request->input('ticket_id');
        $reportTrackers = ReportTracker::whereHas('report', function ($query) use ($ticketId) {
            $query->where('ticket_id', $ticketId);
        })
        ->orderByDesc('updated_at')
        ->get();

        return view('reports.track', ['reportTrackers' => $reportTrackers, 'ticketId' => $ticketId]);
    }
}
