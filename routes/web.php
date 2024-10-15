<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('about',function(){
    return view('about');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop',[ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product_slug}',[ShopController::class, 'product_details'])->name('shop.product.details');

//Cart Routes
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add',[CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('/cart/increase-qunatity/{rowId}',[CartController::class,'increase_item_quantity'])->name('cart.increase.qty');
Route::put('/cart/reduce-qunatity/{rowId}',[CartController::class,'reduce_item_quantity'])->name('cart.reduce.qty');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove_item'])->name('cart.item.remove');
Route::delete('/cart/clear', [CartController::class, 'empty_cart'])->name('cart.empty');

//Wishlist Route
Route::post('/wishlist/add',[WishlistController::class,'add_to_wishlist'])->name('wishlist.add');
Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::delete('/wishlist/item/remove/{rowId}',[WishlistController::class,'remove_item'])->name('wishlist.item.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'empty_wishlist'])->name('wishlist.item.clear');
Route::post('/wishlist/move-to-cart/{rowId}',[WishlistController::class,'move_to_cart'])->name('wishlist.move.to.cart');

//Checkout Route
Route::get('/checkout',[CartController::class,'checkout'])->name('cart.checkout');
Route::post('/place-an-order',[CartController::class,'place_an_order'])->name('cart.place.an.order');
Route::get('/order-confirmation',[CartController::class,'order_confirmation'])->name('cart.order.confirmation');

//Search Route
Route::get('/search',[HomeController::class,'search'])->name('home.search');



//User Routes
Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/account-orders',[UserController::class,'orders'])->name('user.order');
    Route::get('/account-order/{order_id}/details',[UserController::class,'order_details'])->name('user.order.details');
    Route::put('/account-order/cancel-order',[UserController::class,'order_cancel'])->name('user.order.cancel');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update-password');
});



//Admin Routes
Route::middleware(['auth',AuthAdmin::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //Export Route
    Route::get('/admin/products/export', [App\Http\Controllers\AdminController::class, 'export'])->name('admin.products.export');

    //Category Routes
    Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
    Route::get('/admin/category/add',[AdminController::class,'category_add'])->name('admin.category.add');
    Route::post('/admin/category/store',[AdminController::class,'category_store'])->name('admin.category.store');
    Route::get('/admin/category/{id}/edit',[AdminController::class,'category_edit'])->name('admin.category.edit');
    Route::put('/admin/category/update',[AdminController::class,'category_update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}/delete',[AdminController::class,'category_delete'])->name('admin.category.delete');

    //Product Routes
    Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('/admin/product/add',[AdminController::class,'product_add'])->name('admin.product.add');
    Route::post('/admin/products/store',[AdminController::class,'product_store'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit',[AdminController::class,'product_edit'])->name('admin.product.edit');
    Route::put('/admin/product/update',[AdminController::class,'product_update'])->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete',[AdminController::class,'product_delete'])->name('admin.product.delete');

    //Order Routes
    Route::get('/admin/orders',[AdminController::class,'orders'])->name('admin.orders');
    Route::get('/admin/order/{order_id}/details',[AdminController::class,'order_details'])->name('admin.order.details');
    Route::put('/admin/order/updated-status',[AdminController::class,'update_order_status'])->name('admin.order.status.update');

    //Search Route
    Route::get('/admin/search',[AdminController::class,'search'])->name('admin.search');
});
