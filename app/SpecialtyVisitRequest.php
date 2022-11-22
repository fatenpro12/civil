<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialtyVisitRequest extends Model
{
   
    protected $table ="specialtiy_visit_request";
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
