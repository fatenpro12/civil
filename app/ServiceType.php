<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    public function suppoerRequest(){
        return $this->belongsTo(DesignRequest::class);
    }
}
