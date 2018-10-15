<?php

namespace Depakespedro\LaravelAuthUrl\Http\Controllers;

use App\Http\Controllers\Controller;
use Depakespedro\LaravelAuthUrl\Facades\Manager;

class AuthUrlController extends Controller
{
    public function login($hash)
    {
        $authUrl = Manager::checkHash($hash);

        if (is_null($authUrl)) {
            return redirect(config('auth_url.redirect.error'));
        }

        $urlRedirect = $authUrl->getUrlRedirect();

        Manager::deleteHash($authUrl->hash);

        return redirect($urlRedirect);
    }
}
