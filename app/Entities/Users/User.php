<?php

namespace App\Entities\Users;

use App\Entities\Clinics\Clinic;
use App\Entities\Clinics\Doctor;
use App\Entities\Customers\Customer;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_CLINIC_OWNER = 'clinic';
    const ROLE_CLINIC_DOCTOR = 'doctor';
    const ROLE_PET_OWNER = 'pet-owner';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * declare relation to `Clinic` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'user_id', 'id');
    }

    /**
     * declare relation to `Doctor` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'user_id', 'id');
    }

    /**
     * declare relation to `Customer` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'id');
    }
}
