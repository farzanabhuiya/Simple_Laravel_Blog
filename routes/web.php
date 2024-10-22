<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomePageController;



Auth::routes();

                  //homepage route
 Route::get('/', [HomePageController::class, 'index'])->name('Frontend.homePage');
                  
                  
                   //dashboard route
 Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
                  
                  
                     ///post route
 Route::middleware('auth')->prefix('/backend/post')->controller(PostController::class)->name('Post.')->group(
                          function(){
                              Route::get('/' ,'index')->name('index');
                              Route::get('/create' ,'create')->name('create');
                              Route::post('/story' ,'story')->name('story');
                              Route::get('/edit/{id}','edit')->name('edit');
                              Route::put('/update/{id}','update')->name('update');
                              Route::delete('/delete/{id}','delete')->name('delete');
                              
                      
                      
                          }
                      );
