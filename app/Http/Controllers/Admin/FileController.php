<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Protype;
use App\Http\Controllers\Controller;
use Auth;

class FileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    //Hiển thị trang file
    function file(){
        return view('admin.file');
    }

    //Up ảnh vô file
    function upload(HttpRequest $reg){
        if($reg -> hasFile('file')){
            $name = $reg -> file -> getClientOriginalname();
            $reg -> file ->move('/public/img/',$name);
        }

        return redirect()-> back();
    }
}
?>