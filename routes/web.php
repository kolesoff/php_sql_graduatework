<?php

Route::get('/', function () {
    return redirect()->route('question.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController', ['middleware' => 'auth', 'except'=>[
  'destroy'
]]);

Route::resource('topic', 'TopicController', ['middleware' => 'auth', 'except'=>[
    'edit', 'update'    
]]);

Route::resource('question', 'QuestionController');
