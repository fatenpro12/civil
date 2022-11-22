<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Document extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\Components\User\Models\User','user_id');
    }
    
}
