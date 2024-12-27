<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', action: function () {
//     return view('static/about');
// });


// // Route::get('contact', function () {
// //     return view('static.contact');
// // });

// Route::view('contact', 'static.contact');

// // customers
// Route::get('customers', function () {
//     return view('customers/index');
// });

// Route::get('customers/{customer}', function ($customer) {
//     return $customer;
// });

// Route::get('customers/in/{country}', function ($country) {
//     return view('customers/by-country', data: ['country' => $country]);
// });


// Route::get('customers/in/{country}/{city}', function ($country, $city) {

//     echo "Welcome to $city, $country";

//     // return view('customers.by-city', compact('country', 'city'));
// });


// // products
// Route::get('products/category/{category}', function ($category) {
//     return $category;
// });

// Route::get('news/live/{post}', function ($post) {
//     return $post;
// });


// suppliers
// Route::get('suppliers', 'App\Http\Controllers\SupplierController@index');

// Route::get('suppliers', ['App\Http\Controllers\SupplierController', 'index']);

// Route::get('suppliers', [SupplierController::class, 'index']);
// Route::get('suppliers/{supplier}', [SupplierController::class, 'show']);


// Route::controller(SupplierController::class)
//     ->prefix('suppliers')
//     ->group(function () {
//         Route::get('', 'index');
//         Route::get('{supplier}', 'show');
//     });
// OR

// Route::prefix('suppliers')
//     ->controller(SupplierController::class)
//     ->group(function () {
//         Route::get('/', 'index');
//         Route::get('{supplier}', 'show');
//     });

// Route::get('help', function () {
//     return 'I am here to help you';
// });

// Route::get('support', function () {
//     return 'I am here to give you a support';
// });


// // Posts

// Route::prefix('posts')
//     ->controller(PostController::class)
//     ->group(function () {
//         Route::get('pending', 'pending');
//     });

// Route::resource('posts', PostController::class);



// Route::resource('books', BookController::class);
