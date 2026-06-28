<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // Sesuai DATABASE.md, tabel ini tidak memiliki updated_at
    const UPDATED_AT = null;

    protected $fillable = [
        'activity',
        'description',
    ];
}