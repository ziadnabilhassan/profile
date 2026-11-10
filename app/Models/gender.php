<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class gender extends Model
{
    use HasFactory;
        use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];

    public function categories()
{
    return $this->belongsToMany(Category::class);
}
   public function products()
    {
        return $this->hasMany(Product::class);
    }
}
