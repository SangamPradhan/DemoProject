<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageUser extends Model
{
    use HasFactory;

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
