<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCustomer extends Model
{
    protected $fillable = ['customer_name', 'customer_address'];
}
