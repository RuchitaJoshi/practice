<?php

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

use App\Address;
use App\Post;
use App\Role;
use App\Staff;
use App\Tag;
use App\User;
use App\Video;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
   // return view('welcome');
    //return 'welcome';

//    $user = Auth::user();
//    if($user->isAdmin()){
//        echo "this user is admin";
//    }
//    else{
//        echo "error";
//    }

    $data = [
        'title'=>'dear god',
        'content'=>'please guide me to get a good job in laravel'
    ];

    Mail::send('emails.test',$data, function ($message){
        $message->to('ruchita.joshi18388@gmail.com')->subject('m njoying learning laravel');
    });

});

Route::get('/admin', 'AdminController@index');

Route::post('login','Auth\LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('logout','Auth\LoginController@logout');

Route::middleware('auth:api')->get('/user',function (Request $request){
    return $request->user();
});


Route::get('/insert', function (){
    $user = User::findOrFail(1);
    $address = new Address(['name'=>'westbury street']);
    $user->address()->save($address);
});

Route::get('/update', function (){
    $address = Address::whereUserId(1)->first();
    $address->name = "udpdated address";
    $address->save();
});

Route::get('/read', function (){
    $user = User::findOrFail(1);
    echo $user->address;
});

Route::get('/delete', function (){
    $user = User::findOrFail(1);
    $user->address->delete();
    return "data deleted";
});

Route::get('/create',function (){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'post2', 'body'=>'post2 data', 'user_id'=>$user]);
    $user->posts()->save($post);
});

Route::get('/readpost', function (){
    $user = User::findOrFail(1);
    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
});

Route::get('/updatepost', function (){
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->update(['body'=>'data for post1']);
    return "Data Updated";
});

Route::get('/delete', function (){
    $user = User::findOrFail(1);
    $user->posts()->first()->delete();
});

Route::get('/createrole',function (){
    $user = User::findOrFail(1);
    $role = new Role(['name'=>'subscriber']);
    $user->roles()->save($role);
});

Route::get('/readrole', function (){
    $user = User::findOrFail(1);
    //echo $user->roles;
    foreach($user->roles as $role){
        echo $role->name . "<br>";
    }
});

Route::get('/updaterole', function (){
    $user = User::findOrFail(1);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'admin'){
                $role->name = 'administrator';
                $role->save();
            }
        }
    }
});

Route::get('/deleterole', function (){
    $user = User::findOrFail(1);
    $user->roles()->delete();
//    foreach($user->roles as $role){
//        if($role->name == 'student '){
//            $role->delete();
//            return "Role deleted";
//        }
//    }
});

Route::get('/attach' , function (){
    $user = User::findOrFail(1);
    $user->roles()->attach(1);
});


Route::get('/detach' , function (){
    $user = User::findOrFail(1);
    $user->roles()->detach(1);
});

Route::get('/sync' , function (){
    $user = User::findOrFail(1);
    $user->roles()->sync([1,2,3]);
});

Route::get('/createstaffphoto', function (){
    $staff = Staff::findOrFail(1);
    $staff->photos()->create(['path'=>'example.jpg']);
    return "Staff Photo Created";
});

Route::get('/readstaffphoto', function (){
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $photo){
        return $photo->path;
    }
});

Route::get('/updatestaffphoto', function (){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->update(['path'=>'updated.jpg']);
    $photo->save();
});

Route::get('/deletestaffphoto', function (){
    $staff = Staff::findOrFail(1);
    $staff->photos()->delete();
    return "Staff Photo Deleted";
});

Route::get('/createpvtag', function (){
    $post = Post::findOrFail(1);
    $tag1 = Tag::findOrFail(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video1.mov']);
    $tag2 = Tag::findOrFail(2);
    $video->tags()->save($tag2);

    return "Data Created";
});

Route::get('/readpvtag', function (){
    $post = Post::findOrFail(1);
    $video = Video::findOrFail(1);
    foreach ($post->tags as $tag){
        echo $tag . "<br>";
    }
    foreach ($video->tags as $tag){
        echo $tag;
    }
});

Route::get('/updatepvtag', function (){
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
        $tag->whereId(1)->update(['name'=>'updated name']);
        return "Data updated";
    }
});

Route::get('/deletepvtag', function (){
    $post = Post::findOrFail(1);

});

//Route::group(['middleware'=>'web'], function(){
//    Route::resource('/posts', 'PostsController');
////
////    Route::get('/giveme', 'PostsController@giveme');
////
////    Route::delete('/posts/{post}', 'PostsController@destroy');
////
////    Route::post('/posts/create', 'PostsController@store');
//
////    Route::post('/addItem', 'PostsController@addItem');
//});

Route::get('/posts', 'PostsController@index');

Route::post('/posts', 'PostsController@store');

Route::put('/posts/{post_id}', 'PostsController@update');

Route::delete('/posts/{post_id}', 'PostsController@destroy');
/*
 *
 * ADMIN PANEL RELATED ROUTES
 *
 */

Route::resource('/admin/users', 'AdminUsersController');

Route::get('/admin', function (){
    return view('admin.index');
});

//Testing Routes
Route::get('/threads', 'ThreadsController@index');

Route::get('/threads/create', 'ThreadsController@create');

Route::get('/threads/{channel}', 'ThreadsController@index');

Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');

Route::post('/threads', 'ThreadsController@store');

//Route::resource('threads', 'ThreadsController');

Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');


//Project Routes
//Display Index Page
Route::get('/project', 'ProjectsController@index');
// Populate Data in Edit Modal Form
Route::get('project/{project_id?}', 'ProjectsController@show');
//create New Project
Route::post('project', 'ProjectsController@store');
// update Existing Project
Route::put('project/{project_id}', 'ProjectsController@update');
// delete Project
Route::delete('project/{project_id}', 'ProjectsController@destroy');
