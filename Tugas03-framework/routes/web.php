<?php

use App\Http\Controllers\RouteController;
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

Route::get('/', function () {
    return view('welcome');
});

//routing 1
Route::get('/routing', function() {
    return view('routing');
});

//basic routing
Route::get('/basic_routing', function() {
    return 'Hello World';
});

//view route
Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Purnama']);

//controler route
Route::get('/controller_route', [RouteController::class, 'index']);

//reditect
Route::redirect('/', '/routing');

//required parameter
Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

//optional parameter
Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

//Route With Regular Expression Constraints
Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('title', '[A-Za-z]+');

//name route
Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

//route prioriitas
//Route::get('/route_priority/{rpId}', function($rpId) {
//    return "This is Route One";
//});
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});
Route::get('/route_priority/user', function() {
    return "This is Route 3";
});
//Apabila salah satu route diatas di dikomen maka yang muncul adalah route 3. hal tersebut dikarenakan
//yang diterakhir masuk akan diprioritaskan/yang ditampilkan


//fallback route
Route::fallback(function() {
    return 'This is Fallback Route';
});

//route group dan prefix
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});


Route::get('/boostrap_clone', function() {
    return view('boostrap_clone');
});
