<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable = ['purchase_id', 'product_id', 'product_code', 'manufracture_date', 'expire_date', 'quantity', 'unit_price', 'total_price', 'mrp'];
}
