<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Activitylog\LogOptions;

class Report extends Model implements HasMedia
{
    use LogsActivity , InteractsWithMedia;
   protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function stage()
    {
        return $this->belongsTo(StageProject::class, 'stage_id' );
    }
    public function type()
    {
        return $this->belongsTo('App\ReportType');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
   /**
     * Return the creator of task.
     */
    public function reportCreator()
    {
        return $this->belongsTo('App\Components\User\Models\User', 'created_by');
    }
    public function office()
    {
        return $this->belongsTo('App\Components\User\Models\User', 'office_id');
    }
}
