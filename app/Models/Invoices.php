<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model

{
    protected $table = 'invoices';
    public $timestamps = false;
    protected $fillable = [
        'customer_name',
        'customer_address',
        'item_name',
        'qty',
        'item_price',
        'serial_no',
        'created_at',
    ];
}
