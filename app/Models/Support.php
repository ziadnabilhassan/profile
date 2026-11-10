<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Support extends Model
{
     use HasFactory;
    use HasTranslations;
    public $translatable = ['name','Contact'];
    protected $guarded = [];

}
