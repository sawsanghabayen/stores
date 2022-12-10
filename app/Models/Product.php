<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['store_name'];

    public function getStoreNameAttribute()
    {
        return $this->Market()->first()->name;
    }

    public function market()
    {
        return $this->belongsTo(Market::class, 'market_id', 'id');
    }

    public function getActiveStatusAttribute()
    {
        return $this->discount ? 'Enable' : 'Disabled';
    }
}
