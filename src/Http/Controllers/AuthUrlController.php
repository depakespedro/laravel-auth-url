<?php

namespace Depakespedro\LaravelAuthUrl\Http\Controllers;

use App\Http\Controllers\Controller;
use Depakespedro\LaravelAuthUrl\Contracts\AuthUrlContract;
use Depakespedro\LaravelAuthUrl\Models\AuthUrl;

class AuthUrlController extends Controller
{
    public function login()
    {
        $userNamespace = app('Depakespedro\LaravelAuthUrl\Models\User');

        $user = new $userNamespace();

        $authUrlManager = app(AuthUrlContract::class);

        $authUrl = $authUrlManager->createAuthUrl(new AuthUrl());

        dump($authUrl);
    }
}
