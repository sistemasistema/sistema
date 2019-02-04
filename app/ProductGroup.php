<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $table = 'product_groups';

    public function product_subgroups()
    {
        return $this->hasMany('App\ProductSubgroup');
    }
}
