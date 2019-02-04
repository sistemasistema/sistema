<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'registration_number',
        'vat_code',
        'street_l_a',
        'city_l_a',
        'village_l_a',
        'country_l_a',
        'postcode_l_a',
        'street_a_a',
        'city_a_a',
        'village_a_a',
        'country_a_a',
        'postcode_a_a',
        'homepage',
        'head_name',
        'head_surname',
        'mobile_phone_number',
        'phone_number',
        'fax',
        'email',
        'bank_id',
        'bank_account_number',
    ];

    /**
     * Get the banks for the supplier.
     */
    public function banks()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }
}
