<?php

namespace Modules\Translation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'lang',
        'race'
    ];

    protected static function newFactory()
    {
        return \Modules\Translation\Database\factories\TranslationFactory::new();
    }
}
