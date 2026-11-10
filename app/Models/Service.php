<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title', 'text'];
    protected $guarded = [];
        public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
