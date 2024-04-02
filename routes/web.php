<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    // $data=Category::query()->find(1); //quan hệ 1-1 lấy data
    // $post=$data->post()->where('id',10)->first(); // quan hệ 1-1
    // dd($post);

    // $data = Category::query()->find(1);
    // $posts=$data->posts(); // quan hệ 1- n và lấy data luôn
    // dd($posts);


    // $data = Category::query()->with('post')->limit(5)->get();//dùng with
    // $data = Category::query()->limit(5)->get(); // dùng laod 
    // Post::query()                    // dùng laod 
    //     ->where('category', 1)
    //     ->update([
    //         'name' => '123456'
    //     ]);

    // $data->load('post');// dùng laod 

    // foreach ($data as $item) {
    //     $post = $item->post;
    // dd($post);
    // }



    //post
    // $posts = Post::query()->get();
    // foreach ($posts as $post) {
    //     $categoryName=$post->category->name;
    //     // dd($categoryName) ;
    //     dd($post->name) ;
    // }





    // nhiều nhiều

    $post = Post::query()->find(1);
    $tagIDs = [5, 9, 8, 7]; //chỉ gồm số id
    // $post->tags()->sync($tagIDs); // xóa các số đã tồn tại trong mảng tagIDs thêm những số mới
    //  $post->tags()->toggle($tagIDs) //toggle vừa thêm vừa xóa nếu số nào tồn tại trog mảng này $tagIDs thì xóa và thêm nhưng cái mới 
    // $post->tags()->syncWithoutDetaching($tagIDs);// chỉ thêm vào ko có xóa

    // dd($post);
    //lấy ra
    $post->tags->toArray();

    return view('welcome');
});


// Route::get('/', function () {
//     return view('welcome');
//     // return (DB::table('posts')
//     //     ->where('id', '<', 100)
//     //     ->orderByDesc('id')
//     //     ->get()
//     // );
// });
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth', IsAdminMiddleware::class]);
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);


// Route::get('show-form-sigup', [AuthController::class, 'AuthController@showFormSigup'])->name('sigup-form');
// Route::get('show-form-login', [AuthController::class, 'AuthController@showFormLogin'])->name('login-form');
// Route::post('sigup', [AuthController::class, 'AuthController@sigup'])->name('sigup');
// Route::post('login', [AuthController::class, 'AuthController@login'])->name('login');
// Route::post('logout', [AuthController::class, 'AuthController@logout'])->name('logout');



Route::get('show-form-sigup',  [AuthController::class, 'showFormSigup'])->name('sigup-form');
Route::get('show-form-login',   [AuthController::class, 'showFormLogin'])->name('login-form');
Route::post('sigup',           [AuthController::class, 'sigup'])->name('sigup');
Route::post('login',            [AuthController::class, 'login'])->name('login');
Route::get('logout',           [AuthController::class, 'logout'])->name('logout')->middleware('auth');
