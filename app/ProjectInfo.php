<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    protected $guarded = ['id'];
    protected static $logUnguarded = true;
    protected static $logOnlyDirty = true;

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
