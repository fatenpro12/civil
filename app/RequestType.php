<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// this model for choose the type of the request
class RequestType extends Model
{
    protected $guarded = ['id'];

    protected $fillable= ['name'];
}
