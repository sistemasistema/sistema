<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'personal_code',
        'position',
        'street',
        'city',
        'village',
        'country',
        'postcode',
        'mobile_phone_number',
        'phone_number',
        'fax',
        'email',
        'password',
        'bank_id',
        'bank_account_number',
        'status_id',
        'role_id',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'remember_token',
    ];

    /**
     * Get the user statuses for the user.
     */
    public function user_statuses()
    {
        return $this->belongsTo('App\UserStatus', 'status_id');
    }

    /**
     * Get the user statuses for the user.
     */
    public function user_roles()
    {
        return $this->belongsTo('App\UserRole',  'role_id');
    }

    /**
     * Get the banks for the user.
     */
    public function banks()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }

    public function isAdmin() {
        return ($this->role_id == 1);
    }
}
