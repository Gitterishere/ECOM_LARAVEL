<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Temporary route for genearting new password
// Route::get('/generate-password', function () {
//     return bcrypt('admin@12345');
// });




route::get('/',[HomeController::class,'home']);

route::get('/dashboard',[HomeController::class,'login_home'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard',[HomeController::class,'index']);
route::get('view_category',[AdminController::class,'view_category']);
route::post('add_category',[AdminController::class,'add_category']);
route::get('delete_category/{id}',[AdminController::class,'delete_category']);
route::get('edit_category/{id}',[AdminController::class,'edit_category']);
route::post('update_category/{id}',[AdminController::class,'update_category']);
route::post('upload_product',[AdminController::class,'upload_product']);
route::get('add_product',[AdminController::class,'add_product']);
route::get('view_product',[AdminController::class,'view_product']);
route::get('delete_product/{id}',[AdminController::class,'delete_product']);
route::get('update_product/{slug}',[AdminController::class,'update_product']);
route::post('edit_product/{id}',[AdminController::class,'edit_product']);
route::get('product_search',[AdminController::class,'product_search']);
route::get('product_detail/{id}',[HomeController::class,'product_detail']);
route::get('add_cart/{id}',[HomeController::class,'add_cart']);
route::get('mycart',[HomeController::class,'mycart']);
route::get('remove_product/{id}',[HomeController::class,'remove_product']);
route::post('confirm_order',[HomeController::class,'confirm_order']);
route::get('view_orders',[AdminController::class,'view_orders']);
route::get('on_the_way/{id}',[AdminController::class,'on_the_way']);
route::get('delivered/{id}',[AdminController::class,'delivered']);
route::get('print_pdf/{id}',[AdminController::class,'print_pdf']);
route::get('/myorders',[HomeController::class,'myorders']);
Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});

route::get('shop',[HomeController::class,'shop']);
route::get('why',[HomeController::class,'why']);
route::get('testimonial',[HomeController::class,'testimonial']);
route::get('contact',[HomeController::class,'contact']);





