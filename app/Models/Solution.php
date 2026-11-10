<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Solution extends Model
{
  use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];
        public function solutionitems()
    {
        return $this->hasMany(Solutionitem::class);
    }
}
