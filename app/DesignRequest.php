<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
// this model for choose the type of the request
class DesignRequest extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = ['id'];

    //protected $fillable= ['name'];
    protected $table ="design_request";
    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function service_type(){
        return $this->belongsTo(ServiceType::class,'service_type_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Components\User\Models\User','customer_id');
    }
    public function creator()
    {
        return $this->belongsTo('App\Components\User\Models\User','created_by');
    }
    public function offices()
    {
        return $this->belongsToMany('App\Components\User\Models\User','design_request_office','design_request_id','office_id')->withPivot(['office_status','request_type']);
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
///////////// stages of design ////////////////
    public function stages()
    {
        return $this->belongsToMany('App\StageProject', 'stages_project_design_request', 'design_id', 'stage_id' );
    }

    public function designEnginners()
    {
        return $this->hasMany('App\DesignEnginner','design_id');
    }
    public function enginners()
    {
        return $this->belongsToMany('App\Components\User\Models\User', 'stages_project_design_request', 'design_id', 'enginner_id');
    }
}
