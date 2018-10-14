<?php

Route::get('/auth/url', 'Depakespedro\LaravelAuthUrl\Http\Controllers\AuthUrlController@login')->name('auth.url');