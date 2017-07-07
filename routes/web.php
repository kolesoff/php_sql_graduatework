<?php

Route::get('/', function () {
    return redirect()->route('question.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController', ['middleware' => 'auth', 'except'=>[
  'show', 'destroy'
]]);

Route::resource('topic', 'TopicController', ['middleware' => 'auth', 'except'=>[
    'edit', 'update'    
]]);

Route::resource('question', 'QuestionController', ['except'=>[
  'show'
]]);

Route::resource('question', 'QuestionController', ['middleware' => 'auth', 'only'=>[
  'edit', 'update', 'destroy'
]]);
