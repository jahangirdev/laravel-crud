<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CategoryController;

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
    return view('admin.home');
})->middleware('auth')->middleware('verified');
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->to('/');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('verification_success', 'Email verification is successfull!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/classes', [ClassController::class, 'index'])->name('classes.all');
Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
Route::post('/class/store', [ClassController::class, 'store'])->name('class.store');
Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::get('/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
Route::post('/class/update', [ClassController::class, 'update'])->name('class.update');

/** Routes for students CRUD
 * Create
 * Read
 * update
 * Delete
*/

Route::resource('students', StudentsController::class);

/** Routes for categories CRUD
 * create
 * read
 * update
 * delete
*/

Route::resource('categories', CategoryController::class);
