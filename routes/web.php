<?php

Route::get('/', function () {
    return redirect()->route('question.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

Route::resource('topic', 'TopicController', ['except'=>[
    'edit', 'update'    
]]);

Route::resource('question', 'QuestionController');
