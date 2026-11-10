<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Download extends Model
{
        use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];
    public function downloadtype()
    {
        return $this->belongsTo(Downloadtype::class);
    }
}
