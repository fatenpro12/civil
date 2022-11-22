<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    use HasFactory;

    protected $fillable=['form','type_name_en','type_name_ar'];
    protected $casts = [
        'type_list_ar' => 'array',
        'type_list_en' =>'array'
    ];
    protected $appends=['name'];

    public function getNameAttribute(){
     if(app()->getLocale() == 'ar')
     return $this->type_name_ar;
    else
      return $this->type_name_en;
 }
}
