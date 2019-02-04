<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{
    protected $table = 'car_parts';

    public function car_part_cards()
    {
        return $this->belongsTo('App\CarPartCard', 'car_part_card_id');
    }

    public function manufacturers()
    {
        return $this->belongsTo('App\Manufacturer', 'manufacturer_id');
    }
}
