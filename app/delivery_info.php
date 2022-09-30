<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delivery_info extends Model
{
    protected $table = 'delivery_infos';
    protected $fillable=[
    	  'first_name' , 
            'last_name' , 
            'email' , 
            'address' , 
            'phone' , 
            'country' , 
            'district_id' , 
            'session_id'
    ];
}
