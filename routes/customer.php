<?php
use App\Http\Controllers\Admin\AdminController;

Route::group(['prefix' => 'customer'],function(){
    Route::get('/',[AdminController::class,'customers'])->name('customers');
    Route::get('del-{id}',[AdminController::class,'delete_customer'])->name('customer_del');
});
?>