<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['customer_id','customer_name','product_id','content','rating'];
   
    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
