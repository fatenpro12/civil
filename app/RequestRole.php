<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestRole extends Model
{
    //
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\Components\User\Models\User','user_id');
    }
    public function document(){
        return $this->belongsTo(Document::class,'path_document');
    }
   



}
