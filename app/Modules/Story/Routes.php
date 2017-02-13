<?php
/**
 * Routes - all Module's specific Routes are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */

// The Adminstration Routes.


Route::group(array('prefix' => '', 'namespace' => 'App\Modules\Story\Controllers'), function() {
    Route::get('', 'Marie@index');
    Route::get('triAuteurs','Marie@trierAuteurs');
    Route::get('triTitres','Marie@trierTitres');
    Route::get('story/{id}', 'Maillot@histoire')->where('id', '[0-9]+');
    Route::post('story/{id}', array('before' => 'auth', 'uses' =>'Marie@send'));
    Route::post('mystory', array('before' => 'auth', 'uses' => 'Sacre@postAjoutHistoire'));
    Route::get('del/{id}', array('before' => 'auth', 'uses' => 'Sacre@supprimeHistoire'));
    Route::get('supprimehistoire/{id}', array('before' => 'auth', 'uses' => 'Sacre@postSupprimeHistoire'));
    Route::get('random', 'Sacre@random');
    Route::get('story/addlikes/{id}', array('before' => 'auth', 'uses' => 'Maillot@addLike'))->where('id', '[0-9]+');
    Route::get('mystory', array('before' => 'auth', 'uses' => 'Sacre@myStory'));
    Route::post('recherche', 'Sacre@recherche');
});