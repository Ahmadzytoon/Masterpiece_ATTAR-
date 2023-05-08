<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContuctController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryDiscountController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DeleteDiscountController;
use App\Http\Controllers\User\AllProductController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CartUserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CommentProductController;
use App\Http\Controllers\User\ContactUserController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\PrivateOrderController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\PublicUserController;
use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\SingleProductController;
use App\Http\Controllers\User\UpdateOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('admin.login');
})->name('adminLogin');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

  Route::middleware(['auth', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {
      Route::get('/', [AdminController::class, 'index'])->name('index');
      Route::resource('/category', CategoryController::class);
      Route::resource('/products', ProductController::class);
      Route::resource('/addadmin', AdminController::class);
      Route::resource('/editprofile',AdminController::class);
      Route::resource('/updateprofile',AdminController::class);
      Route::resource('/users',UserController::class);
      Route::resource('/category_discount',CategoryDiscountController::class);
      Route::resource('/product_discount',ProductDiscountController::class);
      Route::get('/discount',[DiscountController::class,'index'])->name('discount');
      Route::get('/discount/create',[DiscountController::class,'addDiscount'])->name('discount.create');
      Route::get('/discount/delete',[DeleteDiscountController::class,'deleteDiscountProduct'])->name('product.delete');
      Route::resource('/comment',CommentController::class);
      Route::resource('/order',OrderController::class);
      Route:: resource('/blog_Admin', BlogAdminController::class);

});

  Route::get('/contactAdmin',[ContuctController::class,'createForm'])->name('contact.createForm')->middleware(['auth','verified','admin']);
  Route::get('/contactAdmin/destroy/{id}',[ContuctController::class, 'destroy'])->name('contact.destroy')->middleware(['auth','verified','admin']);

  // _______________user side____________________


    Route::prefix('user')->name('user.')->group(function () {

        Route::get('/', [PublicUserController::class, 'index'])->name('index');
        Route::resource('/signup', RegisterUserController::class);
        Route::get('/login', [LoginUserController::class, 'index'])->name('login');
        Route::get('/login/check', [LoginUserController::class, 'LoginPost'])->name('login.check');
        Route::get('/login/destroy', [LoginUserController::class, 'destroy'])->name('login.destroy');
        Route::get('/cart',[CartUserController::class,'index'])->name('cart');
        Route::get('/cartdestroy/{id}',[CartUserController::class,'destroy'])->name('cart.destroy');
        Route::get('/addcart/{id}',[CartUserController::class,'addToCart'])->name('cart.add');
        // Route::POST('/addcart/{id}',[CartUserController::class,'addToCart'])->name('cart.add');
        // Route::resource('/PrivateOrder',PrivateOrderController::class);
        Route::resource('/contact', ContactUserController::class);
        Route::resource('/cartupdate', UpdateOrderController::class);
        Route::resource('/checkout', CheckoutController::class);
        Route::resource('/profile', ProfileUserController::class)->middleware(['auth', 'verified']);
        Route::resource('/single_product', SingleProductController::class);
        Route::resource('/comment_product', CommentProductController::class);
        Route::resource('/All_Product', AllProductController::class);
        Route::POST('/search' , [SearchController::class , 'search'])->name('search');
        Route::GET('/search' , [SearchController::class , 'search'])->name('search');
        Route::resource('/blog', BlogController::class);
  });



    // Route::get('/contact', function () {
    //   return view('contact');
    // });

require __DIR__ . '/auth.php';