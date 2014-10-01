<?php

Route::group(['prefix' => 'newsletter', 'namespace' => 'Modules\Newsletter\Http\Controllers'], function () {

    Route::get('/',
        ['as' => 'Newsletter.create', 'uses' => 'NewsletterController@create']
    );
    Route::post('store',
        ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']
    );
});