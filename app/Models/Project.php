<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'completion_date' => 'date',
        'featured' => 'boolean',
    ];
}
