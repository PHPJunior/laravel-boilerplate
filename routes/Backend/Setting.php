<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/15/2017
 * Time: 3:12 PM.
 */
Route::group([
    'prefix'     => 'setting',
    'as'         => 'setting.',
    'namespace'  => 'Setting',
], function () {

    /*
     * Setting Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsPermission:manage-settings',
        'as'         => 'config.',
        'namespace'  => 'Configuration',
    ], function () {
        Route::get('config/general', 'ConfigurationController@general')->name('general');
        Route::get('config/company', 'ConfigurationController@company')->name('company');
        Route::get('config/mail', 'ConfigurationController@mail')->name('mail');
        Route::get('config/system', 'ConfigurationController@system')->name('system');

        Route::post('config/store', 'ConfigurationController@store')->name('store');
    });

    /*
     * Translation Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsPermission:manage-translations',
    ], function () {
        Route::group(['namespace' => 'Translation'], function () {
            Route::get('translation/{languageLine}/line', 'TranslationController@line')->name('translation.line');
            Route::delete('translation/{languageLine}/delete_group', 'TranslationController@deleteLanguageGroup')->name('translation.delete_group');

            Route::resource('translation', 'TranslationController', ['except' => [
                'show',
            ]]);
        });

        Route::group(['namespace' => 'Language'], function () {
            Route::resource('language', 'LanguageController', ['except' => [
                'show',
            ]]);
            Route::get('language/{language}/enable', 'LanguageController@enable')->name('language.enable');
        });
    });
});
