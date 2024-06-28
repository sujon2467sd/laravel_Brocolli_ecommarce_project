<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function searchTags()
    {
        return $this->hasMany(Search::class,);
    }

       public function additionalImgs(){
        return $this->hasMany(AdditionalImg::class);
       }

   public function artibutes()
    {
        return $this->hasMany(Product_artibuteInfo::class);
    }

    public function category(){
        return $this->belongsTo(maincategory::class,'category_id','id');
    }

    // public function categoryoies(){
    //     return $this->hasmany(maincategory::class,'category_id','id');
    // }
    // public function maincategory(){
    //     return $this->belongsTo(maincategory::class, 'category_id', 'id');
    // }

    public function searches()
    {
        return $this->hasMany(Search::class);
    }


}