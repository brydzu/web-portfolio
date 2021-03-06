<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Mail; 


Route::get('/', 'PagesController@home'); 
Route::get('/about', 'PagesController@about'); 
Route::get('/cv', 'PagesController@cv'); 
Route::get('/contact', 'PagesController@contact'); 

//Posts/blog
Route::get('/blog', 'PostsController@index');
Route::get('/blog/{slug}', ['as' => 'blog.post', 'uses'=>'PostsController@post']);

//Sort By Tags 
Route::get('/tags/{tag}', 'TagsController@index');

//Projects
Route::get('/', 'WorksController@index');
Route::get('/works/{slug}', ['as' => 'works.work', 'uses'=>'WorksController@work']);

//Contact Forms 
Route::get('contact', 
    ['as' => 'contact', 'uses' => 'ContactController@create']); 
Route::post('contact', 
    ['as' => 'contact_store', 'uses' => 'ContactController@store']); 

// Route::get('/contact', function() {
    
//     $data = [
//         'title' => 'This is a test message sent from the router',
//         'content' =>'this is some content sent from the router'
//     ];

//     Mail::send('emails.contact', $data, function($message) {
//     $message->to('timbeckett@ymail.com', 'Tim')->subject('Hi, What\'s up');
// }); 
// });

//Admin routes
Route::group(['middleware' => 'admin'], function() {

   Route::resource('admin/posts', 'AdminControllers\PostsController');
   Route::resource('admin/categories', 'AdminControllers\CategoriesController');
   Route::resource('admin/media', 'AdminControllers\MediaController');

    //Works
   Route::resource('admin/works', 'AdminControllers\WorksController');
   //Work Categories
   Route::resource('admin/work-categories', 'AdminControllers\WorkCategoriesController');

   //Case Study
   Route::resource('admin/case-studies', 'AdminControllers\CaseStudiesController');

    //Tags
   Route::resource('admin/tags', 'AdminControllers\TagsController');


});


//File Uploads
// Route::post('/test_images', function() {
//
//    request()->file('test_image')->store('test_images');
//    return back();
// });
