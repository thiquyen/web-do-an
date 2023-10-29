<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Protype;
use App\Http\Controllers\Controller;
use Auth;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //Hiển thị 5 sản phẩm
    function index(){
        $product = Product::orderby('id','DESC')->paginate(5); //SELECT * FROM Product limit(0,5)
        //return view('index',['data'=>$product]);
        return view('/admin/products',['data'=>$product]);
    }

    //Thêm sản phẩm:
    function add()
    {
        $protype = Protype::all();
        return view('/admin/add',['allprotype'=>$protype]);
    }

    //Post thêm sản phâm lên:
    function post_add(Request $request){
        $this->validate($request,[
            'product_name' => 'required|unique:product,product_name',
            'type_id' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'promotion' => 'numeric|min:0|max:100',
            'image' =>'required',
        ],[
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.unique' => 'Tên sản phẩm đã có trong CSDL',
            'type_id.required' => 'Vui lòng chọn tên danh mục',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.min' => 'Giá sản phẩm phải > 0',
            'price.not_in' => 'Giá sản phẩm không được = 0',
            'promotion.min' => 'Khuyến mãi phải >= 0',
            'promotion.max' => 'Khuyến mãi phải < 100',
            'image.required' => 'Vui lòng chọn ảnh sản phẩm',
        ]);
        $img = str_replace(url('img').'/','',$request-> image);
        $request->merge(['image' => $img]);
        Product::create($request->all());
        return redirect()->route('products')->with('success','Thêm sản phẩm thành công');;
    }

    //Sửa sản phẩm
    function edit($id)
    {
        $protype = Protype::all();
        $modal = Product::find($id);
        return view('/admin/edit',['suasp'=>$modal,'allprotype'=>$protype]);
    }

    //Post sửa sản phâm lên:
    function post_editproduct($id,Request $request){
        $this->validate($request,[
            'product_name' => 'required',
            'type_id' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'promotion' => 'numeric|min:0|max:100',
            'image' =>'required',
        ],[
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'type_id.required' => 'Vui lòng chọn tên danh mục',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.min' => 'Giá sản phẩm phải > 0',
            'price.not_in' => 'Giá sản phẩm không được = 0',
            'promotion.min' => 'Khuyến mãi phải >= 0',
            'promotion.max' => 'Khuyến mãi phải < 100',
            'image.required' => 'Vui lòng chọn ảnh sản phẩm',
        ]);
        $img = str_replace(url('img').'/','',$request-> image);
        $request->merge(['image' => $img]);
        $request -> offsetUnset('_token');
        Product::where(['id'=>$id])->update($request->all());
        return redirect()->route('products')->with('success','Sửa sản phẩm thành công');
    }

    //xóa sản phẩm:
    function delete($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success','Xóa sản phẩm thành công');; //Quay lại trang trước đó
    }

}
