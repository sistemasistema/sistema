<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPartCard extends Model
{
    protected $table = 'car_part_cards';

    public function product_subgroups()
    {
        return $this->belongsTo('App\ProductSubgroup', 'product_subgroup_id');
    }

    public function car_parts()
    {
        return $this->hasMany('App\CarPart');
    }
}
