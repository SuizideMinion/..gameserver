<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTechnologies extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'tech_id',
        'time'
    ];
}
