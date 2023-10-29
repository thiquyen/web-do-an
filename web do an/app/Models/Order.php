<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['customer_id','order_note','email','phone','address'];
   
    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function order_detail(){
        return $this->hasMany(Order::class,'id','order_id');
    }
}
