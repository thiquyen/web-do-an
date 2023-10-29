<?php
use App\Http\Controllers\Admin\ProductController;

Route::group(['prefix' => 'products'],function(){
    Route::get('/',[ProductController::class,'index'])->name('products');
    Route::get('del-{id}',[ProductController::class,'delete'])->name('product_del');
    Route::get('edit-{id}',[ProductController::class,'edit'])->name('product_edit');
    Route::post('edit-{id}',[ProductController::class,'post_editproduct'])->name('product_edit');
    Route::get('add',[ProductController::class,'add'])->name('product_add');
    Route::post('add',[ProductController::class,'post_add'])->name('product_add');
});
?>