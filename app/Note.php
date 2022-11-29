<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Note extends Model implements HasMedia
{
    use LogsActivity , InteractsWithMedia;

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['id'];
    protected static $logUnguarded = true;
    protected static $logOnlyDirty = true;

    /**
    * Get all of the owning notable models.
    */
    public function notable()
    {
        return $this->morphTo();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
    /**
     * User who created the note
     */
    public function user()
    {
        return $this->belongsTo('App\Components\User\Models\User', 'created_by');
    }
}
