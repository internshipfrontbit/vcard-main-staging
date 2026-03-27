<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSession extends Model
{
    use HasFactory;

    protected $table = 'sub_sessions'; // optional if table name matches plural form

    protected $fillable = [
        'main_session_id',
        'sub_session_id',
        'store_id',
        'status',
        'last_seen_at',
        'session_type'
    ];

    protected $casts = [
        'last_seen_at' => 'datetime',
    ];
}