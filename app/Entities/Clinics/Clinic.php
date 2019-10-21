<?php

namespace App\Entities\Clinics;

use App\Entities\Users\User;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clinics';

    /**
     * declare relation to `user` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
