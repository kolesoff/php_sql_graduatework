<?php

Route::get('/', function () {
    return redirect()->route('question.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('question', 'QuestionController', ['only'=>[
    'index', 'create', 'store'
]]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except'=>[
        'show', 'destroy'
    ]]);

    Route::resource('topic', 'TopicController', ['except'=>[
        'edit', 'update'    
    ]]);
    
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('question', 'Admin\QuestionController', ['only'=>[
            'edit', 'update', 'destroy'
        ]]);
    });
});
