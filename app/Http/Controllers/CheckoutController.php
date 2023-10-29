<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Protype;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Helper\CartHelper;
use App\Models\Customer;
use Auth;
use Mail;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('cus');
    }

    //
    public function form(){
        $protype = Protype::all();
        return view('home.checkout',['dulieu'=>$protype]);
    }
    
    public function submit_form(Request $request,CartHelper $cart){
        $protype = Protype::all();
        $c_id = Auth::guard('cus')->user()->id;
        $c_email = $request->email;
        $c_name = Auth::guard('cus')->user()->customer_name;
        if($order = Order::create([
            'customer_id' => $c_id,
            'order_note' => $request->order_note,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,  
        ])) {
            $order_id = $order->id;
            foreach($cart->items as $product_id=>$item){
                $quantity = $item['quantity'];
                $price = $item['price'];
                OrderDetail::create([
                    'order_id'=>$order_id,
                    'product_id'=>$product_id,
                    'price'=>$price,
                    'quantity'=>$quantity
                ]);
            }
            Mail::send('email.order',[
                'c_name' => $c_name,
                'order' => $order,
                'items' => $cart->items,
                'total' => $cart ->total_price,
                'order_date' => date("d/m/Y"),
            ],function($mail) use($c_email,$c_name){
                $mail->to($c_email,$c_name);
                $mail->from('deliciouscakesy@gmail.com');
                $mail->subject('Email ordered');
            });
            session(['cart'=>'']);
            return redirect()->back()->with('success','Đặt Hàng Thành Công');
        }
        else{
            return view('checkout',['dulieu'=>$protype])->with('error','Đặt Hàng Thất Bại');;
        }
        
    }

    //Danh sách đơn hàng đã đặt của 1 khách hàng:
    public function getOrderByCustomerId($id){
        $protype = Protype::all();
        $customer=Customer::find($id);
        $orders = Order::where('customer_id',$id)->get();
        return view('home.thongtinkh',['dulieu'=>$protype,'orderbycustomer'=>$orders]);
    }

    public function getOrderDetailByOrderId($id){
        $protype = Protype::all();
        $orders= Order::find($id);
        $orderDetail = OrderDetail::where('order_id',$id)->get();
        return view('home.thongtindh',['dulieu'=>$protype,'orderdetalbyId'=>$orderDetail,'orderbtId'=>$orders]);
    }
}
