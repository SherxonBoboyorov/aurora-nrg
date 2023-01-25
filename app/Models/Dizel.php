<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Dizel extends Model
{
    use HasFactory;

    protected $table = 'dizels';

    protected $fillable = [
        'categoriy_id',
        'title_ru', 'title_uz', 'title_en',
        'content_ru', 'content_uz', 'content_en',
        'meta_title_ru', 'meta_description_ru',
        'meta_title_uz', 'meta_description_uz',
        'meta_title_en', 'meta_description_en',
    ];

    public function categoriy()
    {
        return $this->belongsTo('App\Models\Categoriy', 'categoriy_id');
    }
}
