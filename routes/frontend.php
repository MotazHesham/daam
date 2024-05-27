<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@home')->name('home');

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () { 

    Route::get('joining/form_1', 'HomeController@joining_form_1')->name('joining_form_1');
    Route::get('joining/form_2', 'HomeController@joining_form_2')->name('joining_form_2');
    Route::post('memperships/store', 'HomeController@store_mempership')->name('memperships.store');

    Route::post('subscribe', 'HomeController@subscribe')->name('subscribe'); 
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('chairman', 'HomeController@chairman')->name('chairman');
    Route::get('terms', 'HomeController@terms')->name('terms');
    Route::get('video', 'HomeController@video')->name('video');
    Route::get('jood', 'HomeController@jood')->name('jood');
    Route::get('identity', 'HomeController@identity')->name('identity');
    Route::get('hawkma/{id}', 'HomeController@hawkma')->name('hawkma');
    Route::get('reports/{type}', 'HomeController@reports')->name('reports');

    Route::get('volunteer-guide', 'HomeController@volunteer_guide')->name('volunteer_guide');

    // volunteer
    Route::get('volunteer', 'VolunteerController@volunteer')->name('volunteer');
    Route::post('volunteers/media', 'VolunteerController@storeMedia')->name('volunteers.storeMedia');
    Route::post('volunteers/ckmedia', 'VolunteerController@storeCKEditorImages')->name('volunteers.storeCKEditorImages');
    Route::post('volunteer/store', 'VolunteerController@store')->name('volunteer.store');

    // members
    Route::get('members/{type}', 'MemberController@members')->name('members'); 
    Route::post('members/store', 'MemberController@store')->name('members.store'); 

    // contact
    Route::get('contacts/{type}', 'ContactController@contacts')->name('contacts'); 
    Route::post('contacts/store', 'ContactController@store')->name('contacts.store'); 

    // posts
    Route::get('posts/{type}', 'HomeController@posts')->name('posts');
    Route::get('post/{id}', 'HomeController@post')->name('post');

    // projects
    Route::get('courses', 'CourseController@courses')->name('courses');
    Route::get('course/{id}', 'CourseController@course')->name('course');
    Route::get('course/subscribe/{id}', 'CourseController@subscribe')->name('course.subscribe');
    Route::post('course/storeStudent', 'CourseController@storeStudent')->name('course.storeStudent');

    // projects
    Route::get('projects', 'HomeController@projects')->name('projects');
    Route::get('project/{id}', 'HomeController@project')->name('project');

    // reviews 
    Route::get('reviews', 'ReviewController@reviews')->name('reviews'); 
    Route::post('reviews/store', 'ReviewController@store')->name('reviews.store'); 
    

});