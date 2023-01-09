<?php

use Illuminate\Support\Facades\Route;

// Import Models .
use App\Models\Post;



// Import Dashboard Controllers .
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');

Auth::routes();

// Frontend Routes .

// Show Post Route .
Route::get('/post/show/{id}', [FrontendController::class,'show'])->name('frontend.posts.show');

// Add Comment Route .
Route::post('post/comments/add' , [FrontendController::class,'addComment'])->name('frontend.comments.store');


// Dashboard Routes ..
Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'] , function(){
   
    // Dashboard - Home route .
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Posts Route ..
    Route::group(['prefix' => 'posts'] , function(){
        Route::get('/', [PostController::class,'index'])->name('posts.index');
        Route::get('/create', [PostController::class,'create'])->name('posts.create');
        Route::post('/store', [PostController::class,'store'])->name('posts.store');
        Route::get('/show/{post}', [PostController::class,'show'])->name('posts.show');
        Route::get('/edit/{post}', [PostController::class,'edit'])->name('posts.edit');
        Route::put('/update/{post}', [PostController::class,'update'])->name('posts.update');
        Route::delete('/destroy/{post}', [PostController::class,'destroy'])->name('posts.destroy');
    });

    // Posts Route ..
    Route::group(['prefix' => 'comments'] , function(){
        Route::get('/', [CommentController::class,'index'])->name('comments.index');
        Route::get('/show/{comment}', [CommentController::class,'show'])->name('comments.show');
        Route::delete('/destroy/{comment}', [CommentController::class,'destroy'])->name('comments.destroy');
    });

});
