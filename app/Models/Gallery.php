<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = [];
      use HasTranslations;
    public $translatable = ['title', 'text'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
