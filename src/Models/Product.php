<?php

namespace R64\Checkout\Models;

// extends
use Illuminate\Database\Eloquent\Model;
use R64\Checkout\Contracts\Product as ProductContract;

class Product extends Model implements ProductContract
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = [];
    public $timestamps = true;

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function hasImage()
    {
    }

    public function getImageUrl()
    {
    }

    public function hasTaxRate()
    {
        return true;
    }

    public function getTaxRate()
    {
        return 600;
    }

    public function hasShipping()
    {
    }

    public function getShipping()
    {
    }
}
