<?php

use Illuminate\Support\Facades\Route;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('home');

Route::get('/products', function(Request $request){
    $products=[
     [
         'name' => "sản phẩm 1",
         'price' => "10$",
         'amount' => "1000",
         'img' => "anh 1",
     ],
     [
         'name' => "sản phẩm 2",
         'price' => "30$",
         'amount' => "5000",
         'img' => "anh 2",
     ],
 ];
     $response= $request->all();
     if($response){
         $products[] = $response;
     }
     return view('layout.admin.products.product', [
          'products'=> $products,
          ]
 );
 })->name('products');

Route::get('add-product', function(){
    return view('layout.admin.products.add-product');
})->name('product-add');
Route::get('add-user', function(){
    return view('layout.admin.users.add-user');
})->name('user-add');
Route::get('/users', function (Request $request) {
    $class= 'WE16307';
    $user=[
        [
            'name' => 'khánh 1',
            'age'=>20,
            'status' => 1
        ],
        [
            'name' => 'khánh',
            'age'=>20,            
            'status' => 0
        ]
    ];
    $response= $request->all();
    if($response){
        $user[] = $response;
    }
    return view('layout.admin.users.user', [
         'users'=> $user,
         ]
);
})->name('users');

Route::get('master', function () {
    return view('layout.master');
});


// ---------------------------------------------------------

Route::prefix('/admin')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('list'); //name: users.list
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete');
    Route::get('/create', [UserController::class,'create'])->name('create');
    Route::post('/store', [UserController::class,'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class,'edit'])->name('edit');
    Route::put('/update{user}', [UserController::class,'update'])->name('update');
});