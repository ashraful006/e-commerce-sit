<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', [AboutController::class, 'index']);

Route::get('/contact', [ ContactController::class, 'index' ]);



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






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //$users = User::all();
    $users = DB::table('users')->get();
    
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[UserController::class, 'Logout'])->name('admin.logout');
