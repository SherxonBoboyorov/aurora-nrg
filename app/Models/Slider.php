<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'image',
        'title_ru', 'title_uz', 'title_en',
        'description_ru', 'description_uz', 'description_en',
        'meta_title_ru', 'meta_description_ru',
        'meta_title_uz', 'meta_description_uz',
        'meta_title_en', 'meta_description_en',
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/slider/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/slider/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $slider): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $slider->image)) {
                File::delete(public_path() . $slider->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/slider/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/slider/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $slider->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/slider/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/slider/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
