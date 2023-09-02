@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Lacak Laporan🔎</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('reports.track') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Ticket ID" name="ticket_id" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(isset($reportTrackers))
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ticket ID: {{ $ticketId }}</h3>
        </div>
        @if(count($reportTrackers) > 0)
        <div class="card-body">
            <ul class="timeline">
                @foreach ($reportTrackers as $reportTracker)
                <li>
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel mb-4">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">{{ $reportTracker->updated_at }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="mb-1"><strong>Status:</strong> {{ $reportTracker->status }}</p>
                            <p class="mb-1"><strong>Kategori:</strong> {{ $reportTracker->report->category->name }}</p>
                            <p class="mb-1"><strong>Catatan:</strong> {{ $reportTracker->note ?? '-' }}</p>
                            <p class="mb-1"><strong>Operator:</strong> {{ $reportTracker->user->name }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @else
        <div class="alert alert-info m-2">Oops! Tiket [#{{$ticketId}}] tidak terdaftar atau belum diproses.</div>
        @endif
    </div>
    @endif
</div>
@endsection
