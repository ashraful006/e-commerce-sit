<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


use App\Models\User;
use Illuminate\Support\Facades\DB;


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




// All HomePage Routes


// Home
Route::get('/', function () {


    $brands = DB::table('brands')->get();
    $about = DB::table('home_abouts')->first();
    return view('home', compact('brands','about'));
});


// Route::get('/about', [AboutController::class, 'index']);

// Route::get('/contact', [ ContactController::class, 'index' ]);

// Contact

Route::get('/contact', [ ContactController::class, 'Contact' ])->name('contact');
Route::post('/contact/message/submit', [ ContactController::class, 'ContactMessageSubmit']);






// All Admin Routes

// category

Route::get('/category/all', [ CategoryController::class, 'AllCategory' ])->name('all.category');
Route::post('/category/add', [ CategoryController::class, 'AddCategory'])->name('store.category');
Route::get('/category/edit/{id}', [ CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [ CategoryController::class, 'update']);
Route::get('/category/softdelete/{id}', [ CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [ CategoryController::class, 'Restore']);
Route::get('/category/permanentdelete/{id}', [ CategoryController::class, 'ParmanentDelete']);


// Brands

Route::get('/brands/all', [ BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [ BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [ BrandController::class, 'Edit']);
Route::post('/brand/update/{id}',[BrandController::class, 'Update']);
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);

//Slider

Route::get('/slider/all',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/slider/add',[HomeController::class, 'AddSlider'])->name('add.home.slider');
Route::post('/slider/store',[HomeController::class, 'StoreSlider'])->name('store.home.slider');
Route::get('/slider/edit/{id}',[HomeController::class, 'Edit']);
Route::post('/slider/update/{id}',[HomeController::class, 'Update']);
Route::get('/slider/delete/{id}',[HomeController::class, 'Delete']);


// About

Route::get('/about/all',[AboutController::class, 'AllAbout'])->name('home.about');
Route::get('/about/add',[AboutController::class, 'AddAbout'])->name('add.home.about');
Route::post('/about/store',[AboutController::class, 'StoreAbout'])->name('store.home.about');
Route::get('/about/edit/{id}',[AboutController::class, 'Edit']);
Route::post('/about/update/{id}',[AboutController::class, 'Update']);
Route::get('/about/delete/{id}',[AboutController::class, 'Delete']);

// Contact

Route::get('/admin/contact',[ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/contact/create',[ContactController::class, 'AddAdminContact'])->name('add.contact');
Route::post('/admin/contact/store',[ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/admin/contact/edit/{id}',[ContactController::class, 'Edit']);
Route::post('/admin/contact/update/{id}',[ContactController::class, 'Update']);
Route::get('/admin/contact/delete/{id}',[ContactController::class, 'Delete']);
Route::get('/admin/contact/message',[ContactController::class, 'Messages'])->name('contact.message');

// Change Password

Route::get('/admin/changepassword',[ChangePasswordController::class, 'ChangePasswordPage'])->name('change.password');
Route::post('/admin/password/update',[ChangePasswordController::class, 'Update'])->name('admin.password.update');









Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //$users = User::all();
    $users = DB::table('users')->get();
    
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[UserController::class, 'Logout'])->name('admin.logout');
