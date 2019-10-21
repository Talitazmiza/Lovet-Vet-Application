<?php

namespace App\Entities\Customers\Pets;

use App\Entities\Customers\Customer;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pets';

    /**
     * declare relation to `Customer` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    /**
     * declare relation to `MedicalRecord` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records()
    {
        return $this->hasMany(MedicalRecord::class, 'pet_id', 'id');
    }
}
