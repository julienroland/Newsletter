<?php

Route::group(['prefix' => 'simplenewsletter', 'namespace' => 'Modules\SimpleNewsletter\Http\Controllers'], function () {

    Route::get('/',
        ['as' => 'simpleNewsletter.create', 'uses' => 'SimpleNewsletterController@create']
    );
    Route::post('store',
        ['as' => 'simplenewsletter.store', 'uses' => 'SimpleNewsletterController@store']
    );
});