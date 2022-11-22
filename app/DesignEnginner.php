<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// this model for choose the type of the request
class DesignEnginner extends Model  implements HasMedia
{
    use  InteractsWithMedia;
    protected $guarded = ['id'];

    //protected $fillable= ['name'];
    protected $table ="stages_project_design_request";
    
    public function stage()
    {
        return $this->belongsTo('App\StageProject','stage_id');
    }

    public function enginner()
    {
        return $this->belongsTo('App\Components\User\Models\User','enginner_id');
    }

    
}
