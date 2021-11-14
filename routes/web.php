<?php
Route::post('/subscribe','HomeController@subscribe')->name('subscribe');
Route::post('/campaign','HomeController@createCampaign')->name('campaign');
Route::post('/send','HomeController@send')->name('send');
Route::get('/','HomeController@home')->name('home');