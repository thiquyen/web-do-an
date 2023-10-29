<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['product_name','type_id','image','price','sale_price','promotion','description','expiry'];
    public $timestamps = false;
    function protype(){
        return $this->belongsTo(Protype::class,'type_id','id');
    }

    public function ordDeltail(){
        return $this->hasMany(OrderDetail::class,'id','order_id');
    }
    public function wishlist(){
        return $this->hasOne(WishList::class,'product_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
