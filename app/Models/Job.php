<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'region', 'title', 'description', 'qualification',
        'vacancy', 'salary', 'benefits', 'keyword', 'deadline', 'photo'
    ];
}
