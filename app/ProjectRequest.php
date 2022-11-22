<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable=[
        'name',
        'customer_id',
        'description',
        'start_date',
        'end_date',
        'license_number',
        'authorization_request_number',
        'type_of_request',
        'plot_number',
        'cadastral_decision_number',
        'status'
    ];
    
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
