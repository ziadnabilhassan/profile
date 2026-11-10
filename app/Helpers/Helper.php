<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Helper
{

 public static function storeImage($image, $path)
{
    $path = 'images/' . trim($path, '/');

    $fullPath = storage_path('app/public/' . $path);

    if (!file_exists($fullPath)) {
        mkdir($fullPath, 0755, true);
    }

    $extension = strtolower($image->getClientOriginalExtension());

    // الملفات اللي بتتخزن زي ما هي من غير معالجة
    $rawExtensions = ['pdf', 'mp4', 'mov', 'avi', 'mkv', 'webm', 'wmv', 'flv', '3gp', 'm4v'];

    if (in_array($extension, $rawExtensions, true)) {
        $fileName = uniqid() . '.' . $extension;

        $image->storeAs($path, $fileName, 'public');
    } else {
        $fileName = uniqid() . '.webp';

        $manager = new ImageManager(new Driver());

        $img = $manager->read($image->getRealPath());

        $img->toWebp(75)->save($fullPath . '/' . $fileName);
    }

    return Storage::url($path . '/' . $fileName);
}
    public static function updateImage($image, $oldImage, $path)
    {
        if ($image) {
            self::deleteImage($oldImage);

            return self::storeImage($image, $path);
        }

        return $oldImage;
    }

    public static function deleteImage($path)
    {
        if (!$path) {
            return;
        }

        $relativePath = str_replace('/storage/', '', $path);

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }


    public static function link($route, $id, $title)
    {
        $slug = preg_replace('/[^\p{Arabic}A-Za-z0-9-]+/u', '-', $title);
        return route($route, ['id' => $id, 'slug' => $slug]);
    }

    public static function limit($text, $num = 200)
    {
        $text = strip_tags($text);
        return Str::limit($text, $num);
    }
}
