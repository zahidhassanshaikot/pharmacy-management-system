<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSale extends Model
{
    use SoftDeletes;
    protected $table='product_sales';
    
    protected $dates = ['deleted_at'];
}
