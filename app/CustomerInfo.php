<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    public function customer()
    {
        return $this->hasOne('App\Customer');
    }
}
