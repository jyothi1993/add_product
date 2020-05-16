<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [ 'product_name','category_id','subcategory_id','status'];
    protected $table = 'products';
    protected $primaryKey = 'id';
}
