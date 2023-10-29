<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Customer;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\WishList;
use Auth;
use Mail;

class HomeController extends Controller
{
    //Hiển thị trang chủ
    function index(){
        $product = Product::limit(10)->orderby('id','DESC')->with('wishlist')->get();
        $protype = Protype::all();
        $comment = Comment::with('customer')->orderBy('id','DESC')->limit(4)->get();
        //return view('index',['data'=>$product]);
        return view('home.index',['data'=>$product,'dulieu'=>$protype,'comment'=>$comment]);
    }


    //Lọc sản phẩm ra trang menu
    public function getAllProductMenu(Request $request){
        if(isset($_GET['cate'])){
            $category_filter = $request->cate;
            $category_arr = explode(",",$category_filter);
            $category_by_id = Product::with('protype')->whereIn('type_id',$category_arr)->paginate(6)->appends(request()->query());
        }
        $protype = Protype::all();
        $giamgia = Product::with('protype')->where('promotion',30)->get();
        return view('home.menu',['dulieu'=>$protype,'sp_theoloai' => $category_by_id,'giamgia' => $giamgia]);       
    }

    //Hiển thị chi tiết sp:
    function chitietsp($id)
    {
        $protype = Protype::all();
        $modal = Product::find($id);
        $sp_cungloai = Product::where('type_id',$modal->type_id)->get();
        $comment = Comment::with('customer')->Where('product_id',$id)->orderBy('id','DESC')->get();
        $sosao = Comment::where('product_id',$id)->avg('rating');
        $sosao = round($sosao);
        return view('home.thongtinsp',['dulieu'=>$protype,'thongtinsp'=>$modal,'sp_cungloai'=>$sp_cungloai,'comments'=>$comment,'sosao' => $sosao]);
    }
    //Hiển thị about:
    function about(){
        return view('home.about');
    }
    //Hiển thị team:
    function team(){
         return view('home.team');
    }
    //Hiển thị contact:
    function contact(){
            $protype = Protype::all();
            return view('home.contact');
    }

    //Gửi contact:
    function post_contact(Request $request){
        Mail::send('email.contact',[
            'name' => $request->name,
            'content' => $request->content,
            'email' => $request->email,
        ],function($mail) use($request){
            $mail->to('deliciouscakesy@gmail.com',$request->name);
            $mail->from($request->email);
            $mail->subject($request->subject);
        });
        return redirect()->route('contact')->with('success','Gửi mail thành công');
    }

    //Tìm kiếm sp
    public function timkiemsp(){
        $key = request()->key ? request()->key : '';
        $search = Product::where('product_name', 'Like', '%' . $key . '%')->paginate(8);
        return view('home.timkiemsp',['timkiem'=>$search,'key'=>$key]);
    }

    //Thoát
    public function logout(){
        Auth::guard('cus')->logout();
        return redirect()->route('home.index');
    }

    //Hiển thị trang Đăng nhập
    public function login(){
        return view('home.login');
    }

    //Kiểm tra và tiến hành đăng nhập
    public function post_login(Request $req){
        $this->validate($req,[
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]);

        if(Auth::guard('cus')->attempt($req->only('email','password'))){
            if(Auth::guard('cus')->user()->status == 0){
                Auth::guard('cus')->logout();
                return redirect()->route('home.login')->with('error','Tài khoản của bạn chưa được kích hoạt');
            }
            return redirect()->route('home.index');
        }
        else{
            return redirect()->back()->with('error','Sai email hoặc password');
        }
       
    }

    //Đăng kí tài khoản
    public function register(){
        return view('home.register');
    }

    //Kiểm tra và tiến hành tạo tài khoản và gửi email yêu cầu xác nhận
    public function post_register(Request $request){
            $this->validate($request,[
                'customer_name' => 'required',
                'email' => 'required|email|unique:customer,email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ],[
                'customer_name.required' => 'Tên người dùng không được để trống',
                'email.required' => 'Email không được để trống',
                'email.unique' => 'Email đã được sử dụng',
                'email.email' => 'Email phải đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống',
                'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
                'confirm_password.same' => 'Nhập lại mật khẩu không chính xác'

            ]);
            $token = strtoupper( random_int(1000000000,9999999999));
            $password_h = bcrypt($request->password);
            $data = $request->only('customer_name','email','password','phone','address');
            $data['password'] = $password_h;
            $data['token'] = $token;   
            if($customer = Customer::create($data)){
                Mail::send('email.active_account',compact('customer'),
                    function($mail) use ($customer){
                        $mail->to($customer->email,$customer->customer_name);
                        $mail->from('deliciouscakesy@gmail.com');
                        $mail->subject('Delicious Cake - Xác nhận tài khoản');
                    });
                    return redirect()->route('home.login')->with('success','Đăng kí tài khoản thành công vui lòng xác nhận email');
            }
            return redirect()->back();
    }

    //Kích hoạt tài khoản
    public function actived (Customer $customer,$token){
        if($customer->token === $token){
            $customer->update(['status'=>1,'token' => null]);
            return redirect()->route('home.login')->with('success','Xác nhận tài khoản thành công');
        }
        else{
            return redirect()->route('home.login')->with('error','Xác nhận tài khoản thất bại');
        }
    }


    //Wish view:
    public function wishView(){
        $wishList = WishList::where('customer_id',Auth::guard('cus')->user()->id)->get();
        
        return view('home.wishlist',['wishlist'=>$wishList]);
    }

    //Thêm vào ds yêu thích
    public function addToWish($productID){
        if(Auth::guard('cus')->check()){
            $wishPresent = WishList::where('customer_id',Auth::guard('cus')->user()->id)->where('product_id',$productID)->get();
            if( $wishPresent -> count() == 0){
                $wishList = new WishList;
                $wishList -> customer_id = Auth::guard('cus')->user()->id;
                $wishList -> product_id = $productID;
                $wishList -> save();
                return back()->with('success','Thêm vào wish list thành công');
            }    
            else{
                return back()->with('error','Sản phẩm này đã có trong wish list của bạn');
            }
        }
        return redirect()->route('home.login')->with('error','Vui lòng đăng nhập');;
    }

    //Xóa khỏi danh sách yêu thích
    public function removeToWish($productID){
        WishList::where('customer_id',Auth::guard('cus')->user()->id)->where('product_id',$productID)->delete();
        return back();
    }

    //Cập nhật thông tin cá nhân
    public function update_Profile(Request $request){
        $this->validate($request,[
            'customer_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ],[
                'customer_name.required' => 'Tên người dùng không được để trống',
                'address.required' => 'Địa chỉ không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
        ]);
        $request -> offsetUnset('_token');
        Customer::where(['id'=>Auth::guard('cus')->user()->id])->update($request->all());
        return back()->with('success','Sửa thông tin thành công');
    }

}
