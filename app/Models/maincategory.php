<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maincategory extends Model
{
    use HasFactory;

    protected $guarded = [''];
    public function subCategories(){
        return $this->hasMany(SubCategory::class, 'main_category');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


}