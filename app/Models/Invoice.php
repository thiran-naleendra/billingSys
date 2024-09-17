<?php

namespace App\Models;

// warehouse table get data

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $table = 'invoice';
    public $timestamps = false;

    public $fillable = ['id','customer','price','status','date'];

    
   
}
