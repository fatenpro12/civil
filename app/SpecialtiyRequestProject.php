<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialtiyRequestProject extends Model
{
   
    protected $table ="specialtiy_request_project";
  //  //
        /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

 
       /**
     * Return the creator of task.
     */
    // public function specialtyCreator()
    // {
    //     return $this->belongsTo('App\Components\User\Models\User', 'created_by');
    // }
}
