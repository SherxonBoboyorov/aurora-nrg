<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $table = 'numbers';

    protected $fillable = [
        'number',
        'title_ru', 'title_uz', 'title_en',
        'meta_title_ru', 'meta_description_ru',
        'meta_title_uz', 'meta_description_uz',
        'meta_title_en', 'meta_description_en',

    ];
}
