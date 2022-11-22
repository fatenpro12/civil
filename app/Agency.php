<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $guarded = ['id'];

    //
    public function getUser()
    {
        return $this->belongsTo('App\Components\User\Models\User');
    }
}
