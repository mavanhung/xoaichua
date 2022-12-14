<?php

// Custom routes
Route::group(['namespace' => 'Theme\Stories\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        // Route::get('ajax/get-panel-inner', 'StoriesController@ajaxGetPanelInner')->name('theme.ajax-get-panel-inner');
        // Route::get('ajax/comment/{id}', 'StoriesController@ajaxGetComment')->name('theme.ajax-get-comment');
        // Route::post('ajax/comment', 'StoriesController@ajaxPostComment')->name('theme.ajax-post-comment');

        Route::group([
            'prefix' => 'ajax'
        ],function() {
            Route::get('get-panel-inner', 'StoriesController@ajaxGetPanelInner')->name('theme.ajax-get-panel-inner');
            Route::get('comment/{id}', 'StoriesController@ajaxGetComment')->name('theme.ajax-get-comment');
            Route::post('comment', 'StoriesController@ajaxPostComment')->name('theme.ajax-post-comment');
        });
    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\Stories\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'StoriesController@getIndex')
            ->name('public.index');

        Route::get('sitemap.xml', 'StoriesController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'StoriesController@getView')
            ->name('public.single');

    });
});
