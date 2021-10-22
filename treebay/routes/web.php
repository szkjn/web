<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\ChangePasswordController;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

//Default language
Route::redirect('/', '/en');

//------------------Language
Route::group(['prefix' => '{language}'], function (){
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
    Route::post('/test', [PostController::class, 'orderBy']);

    Route::get('/', function () {
        return view('pages/home', [
            'categories' => Category::all()
        ]);
    })->name('app_home');

   

    Route::get('/pages/about-us', function () {
        return view('pages/about-us');
    })->name('about-us');

    Route::get('/pages/protect-biodiversity', function () {
        return view('pages/protect-biodiversity');
    })->name('protect-biodiversity');


    Auth::routes();

    //------------------------VERIFY USER EMAIL
    Auth::routes(['verify' => true]);



    Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');


    //------------------------USER IS Admin
    Route::get('/admin/layoutAdmin', function(){
        return view('admin/layoutAdmin');
    })->name('admin');
    // Route::get('user.admin', [App\Http\Controllers\UserController::class, 'admin'])->name('admin');


    //------------------------ADMIN USER
    Route::resource('user', 'UserController');
    Route::resource('post', 'PostController');

    // -----------------------display user
    Route::get('/admin/adminUser', function() {
        $displayUser = App\Models\User::all();
        return view('admin/adminUser', ['displayUser' =>$displayUser]);
    })->name('admin_user');


    // -----------------------edit user
    Route::post('user.edit', [App\Http\Controllers\UserController::class, 'edit', 'user'])->name('edit_user');

    // -----------------------update user
    Route::post('user.update', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');

    // -----------------------delete user
    Route::post('user.destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user');

    // -----------------------Modify password acces profile
    Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class, 'index'])->name('change_password');

    Route::post('change-password.updatePassword', [App\Http\Controllers\ChangePasswordController::class, 'updatePassword'])->name('change.password');

    Route::post('change-password.create', [App\Http\Controllers\ProfileController::class, 'create'])->name('create_profile');



    //------------------------POST

    // Route::put('/post/{post}', function (Post $post) {
    //     // The current user may update the post...
    // })->middleware('can:update,post');
    // vérifier pour ajouter un paramètre à policy edit et update.

    // -----------------------display post

    Route::get('post.displayPost', [App\Http\Controllers\PostController::class, 'displayPost', 'disPost'])->name('display_post');

    // -----------------------edit post
    Route::post('post.edit', [App\Http\Controllers\PostController::class, 'edit', 'post'])->name('edit_post');

    // -----------------------update post
    Route::post('post.update', [App\Http\Controllers\PostController::class, 'update'])->name('update_post');


    // -----------------------create post
    Route::get('/pages/addPost', function(){
        $disCat = App\Models\Category::all();
        $location = ['North', 'Center', 'West', 'East', 'South West', 'South East'];
        return view('pages/addPost', [
            'disCat' => $disCat,
            'location' => $location
    ]);
    })->name('add_post');

    Route::post('post.create', [App\Http\Controllers\PostController::class, 'create'])->name('create_post');

    // // -----------------------delete post
    Route::post('post.destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete_post');



    //------------------------category

    // -----------------------display category
    Route::get('category.show', [App\Http\Controllers\CategoryController::class, 'show', 'displayCat'])->name('display_category');

    // -----------------------edit category
    Route::post('category.edit', [App\Http\Controllers\CategoryController::class, 'edit', 'category'])->name('edit_category');

    Route::post('category.update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update_category');

    // -----------------------delete category
    Route::post('category.destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete_category');

    // -----------------------add category
    Route::get('/admin/addCategory', function(){
        return view('admin/addCategory');
    })->name('add_category');

    Route::post('category.create', [App\Http\Controllers\CategoryController::class, 'create'])->name('function_add_category');

}); //end group language






