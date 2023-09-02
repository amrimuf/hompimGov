<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'identity_type',
        'identity_number',
        'pob',
        'dob',
        'address',
    ];
}
