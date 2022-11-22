<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    protected $guarded = ['id'];

    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }
    
    public function specialties()
    {
        return $this->belongsToMany('App\Specialty', 'specialtiy_visit_request', 'rquest_id', 'specialty_id' );
    }

    public function customer()
    {
        return $this->belongsTo('App\Components\User\Models\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function report(){
      return $this->hasOne('App\Report','visit_request_id');
    }
    public function requestEnginners()
    {
        return $this->hasMany('App\RequestEnginner','request_id');
    }
    public function offices()
    {
        return $this->belongsToMany('App\Components\User\Models\User','design_request_office','visit_request_id','office_id')->withPivot('office_status','request_type');
    }
    
       /**
     * The member that belong to the project.
     */
    public function defaultEnginners()
    {
        return $this->belongsToMany('App\Components\User\Models\User', 'default_enginners_requests',);
    }
}
