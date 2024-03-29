<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='products';
    protected $fillable=['categories_id','name','slup','description','list_image','image',
    'price','sale_price','summary','is_sale','start','like_pd','quantity','status','created_at','updated_at'];
}
