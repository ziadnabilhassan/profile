<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
     use HasFactory;
       use HasTranslations;
    public $translatable = ['title'];
    protected $guarded = [];

    public function typecertificate()
    {
        return $this->belongsTo(Typecertificate::class);
    }
}
