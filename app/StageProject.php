<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StageProject extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $table ="stage_project";

}
