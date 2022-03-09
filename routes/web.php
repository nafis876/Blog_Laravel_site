<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/categories/create',[CategoriesController::class,'create']);
Route::post('/categories',[CategoriesController::class,'store']);
Route::get('/categories/index',[CategoriesController::class,'index']);
Route::get('/categories/{category}/edit',[CategoriesController::class,'edit']);
Route::put('/categories/{category}/update',[CategoriesController::class,'update']);

// 

Route::get('/posts/create',[PostsController::class,'create'])->middleware('admin');
Route::post('/posts',[PostsController::class,'store']);
Route::get('/posts/index',[PostsController::class,'index'])->middleware('admin');
Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->middleware('admin');
Route::put('/posts/{post}/update',[PostsController::class,'update'])->middleware('admin');
Route::get('/posts/{post}/approve',[PostsController::class,'approve'])->middleware('admin');


// 

Route::get('/tags/create',[TagsController::class,'create']);
Route::post('/tags',[TagsController::class,'store']);
Route::get('/tags/index',[TagsController::class,'index']);
Route::get('/tags/{tag}/edit',[TagsController::class,'edit']);
Route::put('/tags/{tag}/update',[TagsController::class,'update']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);

Route::get('/posts/{post}',[HomeController::class,'show']);
Route::post('/posts/{post}/comments',[CommentsController::class,'store'])->middleware('auth');
Route::get('/posts/{post}/liked',[CommentsController::class,'storeLike'])->middleware('auth');
Route::get('/comments/{comment}/liked',[CommentsController::class,'storeCommentLike'])->middleware('auth');
Route::get('/posts/{category}/category',[SearchController::class,'searchPostByCtegory']);
Route::get('/posts/{tag}/tag',[SearchController::class,'searchPostByTag'])->name('search.tag');


Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::post('/profile/update', [ProfileController::class, 'update']);


Route::get('/users',[UsersController::class,'index'])->middleware('admin');