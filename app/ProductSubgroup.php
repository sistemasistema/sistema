<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubgroup extends Model
{
    protected $table = 'product_subgroups';

    public function product_groups()
    {
        return $this->belongsTo('App\ProductGroup', 'product_group_id');
    }

    public function car_part_cards()
    {
        return $this->hasMany('App\CarPartCard');
    }
}
