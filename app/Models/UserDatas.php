<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDatas extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'user_id',
        'value'
    ];
}
