<?php

Route::get('/auth/url/{hash}', 'Depakespedro\LaravelAuthUrl\Http\Controllers\AuthUrlController@login')->name('auth.url');