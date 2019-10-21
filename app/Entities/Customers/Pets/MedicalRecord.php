<?php

namespace App\Entities\Customers\Pets;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medical_record';

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

    /**
     * declare relation to any model that trigger to create single medical record
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function reference()
    {
        return $this->morphTo('reference');
    }
}
