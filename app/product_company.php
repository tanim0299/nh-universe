<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_company extends Model
{
     protected $table="product_company";
    protected $fillable=['company_name','admin_id'];
}
