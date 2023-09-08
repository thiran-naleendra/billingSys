<?php

namespace App\Models;

// warehouse table get data

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $table = 'item_list';
    public $timestamps = false;

    public $fillable = ['id','item_name','item_category','item_description','item_price','serial_no'];

    
   
}
