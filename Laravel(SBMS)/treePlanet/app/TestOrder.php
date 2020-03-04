<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model
{
    protected $fillable= ['customer_id','product_name', 'brand', 'quantity', 'budget', 'amount'];
}
