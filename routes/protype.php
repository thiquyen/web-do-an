<?php 
use App\Http\Controllers\Admin\ProtypeController;

Route::group(['prefix' => 'protypes'],function(){
    Route::get('/',[ProtypeController::class,'index'])->name('protypes');
    Route::get('add',[ProtypeController::class,'addprotypes'])->name('protype_add');
    Route::post('add',[ProtypeController::class,'post_addtype'])->name('protype_add');
    Route::get('del-{id}',[ProtypeController::class,'deletetype'])->name('protype_del');
    Route::get('edit-{id}',[ProtypeController::class,'edittype'])->name('protype_edit');
    Route::post('edit-{id}',[ProtypeController::class,'post_edittype'])->name('protype_edit');
});
?>