<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Event::listen('issues.store', function($cover)
{
    $emails = Subscription::whereType($cover->type)->lists('email');

    foreach( $emails as $email ){
        Mail::queue('emails.issue', array('cover' => $cover->toArray()), function($message) use($email)
        {
            $message->to($email, $email)->subject('财富世界订阅内容!');
        });
    }
});

Route::get('/', function () {
    return Redirect::route('issues.index');
});

Route::get('/about', array('uses' => 'PagesController@about', 'as' => 'pages.about'));
Route::get('/services', array('uses' => 'PagesController@services', 'as' => 'pages.services'));
Route::get('/contact', array('uses' => 'PagesController@contact', 'as' => 'pages.contact'));

Route::get('/issues/newspaper', array('uses' => 'CoversController@newspaper', 'as' => 'issues.newspaper'));
Route::get('/issues/magazine', array('uses' => 'CoversController@magazine', 'as' => 'issues.magazine'));
Route::resource('/issues', 'CoversController');
Route::resource('/pages', 'ContentsController');

Route::group(array('before' => 'auth.basic'), function() {
    Route::resource('/admin', 'AdminController');
    Route::get('/admin/create-content/{id}', array('as' => 'admin.create-content', 'uses' => 'AdminController@createContent'));
    Route::post('/admin/create-content', array('as' => 'admin.store-content', 'uses' => 'AdminController@storeContent'));
});

Route::group(array('prefix' => 'subscription'), function() {
    Route::get('/newspaper', array('uses' => 'SubscriptionController@newspaper', 'as' => 'subscription.newspaper'));
    Route::get('/magazine', array('uses' => 'SubscriptionController@magazine', 'as' => 'subscription.magazine'));
    Route::post('/subscribe', array('uses' => 'SubscriptionController@subscribe', 'as' => 'subscription.subscribe'));
});

