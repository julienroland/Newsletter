<?php

Route::group(['prefix' => 'newsletter', 'namespace' => 'Modules\Newsletter\Http\Controllers'], function () {

    get('/',
        ['as' => 'Newsletter.create', 'uses' => 'NewsletterController@create']
    );
    post('store',
        ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']
    );

});

Route::group([
    'prefix' => Config::get('core::core.admin-prefix'),
    'namespace' => 'Modules\Newsletter\Http\Controllers'
], function () {

    Route::resource('newsletters', 'Admin\NewsletterController', [
        'except' => ['show'],
        'names' => [
            'index' => 'dashboard.newsletter.index',
            'create' => 'dashboard.newsletter.create',
            'store' => 'dashboard.newsletter.store',
            'edit' => 'dashboard.newsletter.edit',
            'update' => 'dashboard.newsletter.update',
            'destroy' => 'dashboard.newsletter.destroy',
        ]
    ]);
});
