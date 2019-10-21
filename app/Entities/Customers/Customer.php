<?php

namespace App\Entities\Customers;

use App\Entities\Orders\Order;
use App\Entities\Orders\OrderPet;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * declare relation to `Pet` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pets()
    {
        return $this->belongsToMany(Pets\Pet::class, 'order_pet', 'user_id', 'id')
            ->using(OrderPet::class);
    }

    /**
     * declare relation to `order` model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

}
