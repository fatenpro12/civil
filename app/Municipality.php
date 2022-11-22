<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $appends=['name'];
    protected $fillable = ['name_ar','name_en','province'];
    public function getNameAttribute(){
        if(app()->getLocale() == 'ar')
        return $this->name_ar;
       else
         return $this->name_en;
    }
}
