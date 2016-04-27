<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::resource('courses', 'VideoController');

Route::get('/', 'HomeController@index');
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
Route::get('courses', ['as' => 'courses', 'uses' => 'VideoController@index']);




Route::get('support', function(){
return 'support';
});


//must be loggedin
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);

    Route::get('/courses/upload', ['as' => 'upload', 'uses' => 'VideoController@create']);



    Route::get('/profile/edit', function(){
        return view('auth.profile.edit');
    });

    Route::post('/profile/edit/', function(Request $request){
        $validator = validator::make($request->all(), [

        ]);

        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $profile = new Profile;

        $profile->name = $request->name;
        $profile->save();

        return redirect('/profile');

    });

});






