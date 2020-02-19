<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_id', 'purchase_invoice', 'purchase_date'];
}
