<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'image',
        'video',
        'slug_ru', 'slug_uz', 'slug_en',
        'title_ru', 'title_uz', 'title_en',
        'content_ru', 'content_uz', 'content_en',
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
                    public_path() . '/upload/pages/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/pages/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $page): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $page->image)) {
                File::delete(public_path() . $page->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/pages/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/pages/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $page->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/pages/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/pages/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }


    // video upload


    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            self::checkDirectory();

            $request->file('video')
                ->move(
                    public_path() . '/upload/pages/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/pages/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $page): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $page->video)) {
                File::delete(public_path() . $page->video);
            }

            self::checkDirectory();

            $request->file('video')
                ->move(
                    public_path() . '/upload/pages/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/pages/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $page->video;
    }



}
