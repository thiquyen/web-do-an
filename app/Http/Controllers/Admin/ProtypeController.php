<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Protype;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;
class ProtypeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //Hiển thị loại sản phẩm
    function index(){
        $protype = Protype::all(); //SELECT * FROM Protype
        return view('/admin/protypes',['data'=>$protype]);
    }

    //Thêm loại sản phẩm:
    function addprotypes()
    {
        return view('/admin/addprotypes');
    }

    //Post thêm loại sản phâm lên:
    function post_addtype(Request $request){
        $this -> validate($request,[
            'type_name' => 'required|unique:protypes,type_name'
        ],['type_name.required' => 'Tên danh mục không được để trống'
        , 'type_name.unique' => 'Tên danh mục đã có trong CSDL'
        ]);
        Protype::create($request->all());
        return redirect()->route('protypes')->with('success','Thêm danh mục thành công');
    }

    //Sửa loại sản phẩm:
    function edittype($id)
    {
       $typebyid = Protype::find($id);
       return view('/admin/edittype',['typebyid'=>$typebyid]);
    }
   
    //Post sửa loại sản phâm lên:
    function post_edittype($id,Request $request){
        $this -> validate($request,[
            'type_name' => 'required'
        ],['type_name.required' => 'Tên danh mục không được để trống']);
        $request -> offsetUnset('_token');
        Protype::where(['id'=>$id])->update($request->all());
        return redirect()->route('protypes')->with('success','Sửa danh mục thành công');
    }

    //xóa loại sản phẩm:
    function deletetype($id)
    {
        $product = Product::where('type_id',$id)->get();
        if($product->count() == 0 ){
            Protype::find($id)->delete();
             //Quay lại trang trước đó
            return redirect()->back()->with('success','Xóa danh mục thành công');
        }else{
            return redirect()->back()->with('error','Không thể xóa danh mục vì vẫn còn sản phẩm');
        }     
    } 
}