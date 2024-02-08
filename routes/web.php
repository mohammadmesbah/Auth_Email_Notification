<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Mail\Email;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
})->name('email.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/send',function(){
    $user= "mohammad mesbah";
    Mail::to("engmohammadmesbah1@gmail.com")->send(new Email($user));
    return 'Email is send';
});

Route::get('/posting',[PostController::class,'index'])->middleware('check_user');

Route::resource('posts',PostController::class);
Route::get('/markAsRead',[PostController::class,'markAsRead'])->name('markAsRead');

Route::get('phone',[PhoneController::class,'index']);
Route::get('comment',[PostController::class,'getComment']);
Route::get('getcomment',[CommentController::class,'index']);
Route::get('role',[UserController::class,'index']);

require __DIR__.'/auth.php';
