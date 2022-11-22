<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultEnginnersRequest extends Model
{
    //
    protected $guarded = ['id'];

    public function getDefaultEnginners($request_id)
    {
        return DefaultEnginnersRequest::where('request_id',$request_id)->pluck('request_id')
        ->toArray();
    }
}
