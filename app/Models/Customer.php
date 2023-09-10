<?php

namespace App\Models;

// warehouse table get data

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $table = 'customer';
    public $timestamps = false;

    public $fillable = ['id','name','mobile_no','email','address'];

    
   
}
