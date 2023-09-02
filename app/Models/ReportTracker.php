<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportTracker extends Model
{
    protected $fillable = [
        'user_id',
        'report_id',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
