<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Other model properties and methods
    protected $guarded = [''];
    /**
     * Scope a query to order by the most recent first.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
