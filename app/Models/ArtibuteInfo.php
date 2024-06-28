<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtibuteInfo extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function Artibute(){
          return $this->belongsTo(Artibute::class);
    }
}
