<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Typecertificate extends Model
{
     use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];
        public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }


}
