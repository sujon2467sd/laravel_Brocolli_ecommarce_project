<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    protected $guarded = [''];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');//for delete ordertIteam
    }
    public function shipping_address()
    {
        return $this->hasone(ShippingAddress::class, 'order_id', 'id');//for delete
    }
}
