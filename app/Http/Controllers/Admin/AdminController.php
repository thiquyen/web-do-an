<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Protype;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\WishList;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $product_count = Product::count();
        $protype_count = Protype::count();
        $order_count = Order::count();
        $customer_count = Customer::count();
        return view('dashboard',['product_count'=>$product_count,'protype_count'=>$protype_count,'order_count'=>$order_count,'customer_count'=>$customer_count]);
    }

    //Hiển thị 5 người dùng
    function customers(){
        $customer = Customer::paginate(5); //SELECT * FROM customer limit(0,5)
        return view('/admin/customers',['customers'=>$customer]);
    }

    //Xóa người dùng:
    function delete_customer($id)
    {
        $customer=Customer::find($id);
        $c_name = $customer->customer_name;
        $c_email = $customer->email;

        $orders = Order::where('customer_id',$id)->get();
        foreach($orders as $item){
            OrderDetail::Where('order_id',$item->id)->delete();
        }
        Order::where('customer_id',$id)->delete();
        WishList::where('customer_id',$id)->delete();
        Comment::where('customer_id',$id)->delete();
        Mail::send('email.deletecustomer',[
            'c_name' => $c_name,
        ],function($mail) use($c_email,$c_name){
            $mail->to($c_email,$c_name);
            $mail->from('deliciouscakesy@gmail.com');
            $mail->subject('Email Block Account');
        });

        Customer::find($id)->delete();
        return redirect()->back(); //Quay lại trang trước đó
    }

    //Hiển thị 5 đơn hàng
    function orders(){
        $orders = Order::orderby('id','DESC')->paginate(5); //SELECT * FROM orders limit(0,5)
        return view('/admin/order',['order'=>$orders]);
    }

    //Sửa đơn hàng
    function editOrder($id)
    {
       $orderbyid = Order::find($id);
       return view('/admin/editorder',['orderbyid'=>$orderbyid]);
    }

    //Post sửa trạng thái đơn hàng lên:
     function post_editOrder($id,Request $request){
        $this -> validate($request,[
            'status' => 'required'
        ],['status.required' => 'Trạng thái không được để trống']);
        $request -> offsetUnset('_token');
        Order::where(['id'=>$id])->update($request->all());
        return redirect()->route('orders')->with('success','Sửa trạng thái thành công');
    }

    //Xóa đơn hàng
    function deleteorder($id){
        $orders = Order::where('id',$id)->get();
        foreach($orders as $item){
            OrderDetail::Where('order_id',$item->id)->delete();
        }
        Order::where('id',$id)->delete();    
         return redirect()->back()->with('success','Xóa order thành công');; //Quay lại trang trước đó
    }

    //Hiển thị 5 comment
    function comments(){
        $comments = Comment::orderby('id','DESC')->paginate(5); //SELECT * FROM comments limit(0,5)
        return view('admin.comment',['comments'=>$comments]);
    }
    
     //Xóa comment:
     function deletecomment($id)
     {
         Comment::find($id)->delete();
         return redirect()->back()->with('success','Xóa comment thành công');; //Quay lại trang trước đó
     }
 

     public function getOrderDetailByOrderId($id){
        $protype = Protype::all();
        $orders= Order::find($id);
        $orderDetail = OrderDetail::where('order_id',$id)->get();
        return view('admin.orderdetail',['dulieu'=>$protype,'orderdetalbyId'=>$orderDetail,'orderbtId'=>$orders]);
    }
    
}
