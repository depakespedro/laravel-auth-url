<?php

namespace Depakespedro\LaravelAuthUrl\Repositories;

use Depakespedro\LaravelAuthUrl\Contracts\AuthUrlContract;
use Depakespedro\LaravelAuthUrl\Models\AuthUrl;
use Depakespedro\LaravelAuthUrl\Exceptions\NotFoundUserModel;
use Illuminate\Support\Str;

class AuthUrlRepository implements AuthUrlContract
{

    public function createHash($user, string $redirect = null, array $params = []): AuthUrl
    {
        if (get_class($user) !== app('Depakespedro\LaravelAuthUrl\Models\User')) {
            throw new NotFoundUserModel();
        }

        $authUrl = new AuthUrl();
        $authUrl->user_id = $user->id;
        $authUrl->hash = str_replace('/', '', bcrypt(Str::random(16)));
        $authUrl->redirect = is_null($redirect) ? config('auth_url.redirect.default') : $redirect;
        $authUrl->params = serialize($params);
        $authUrl->save();

        return $authUrl;
    }

    public function checkHash(string $hash): ?AuthUrl
    {
        $authUrl = AuthUrl::where('hash', $hash)->first();

        return $authUrl;
    }

    public function deleteHash(string $hash): bool
    {
        $authUrl = AuthUrl::where('hash', $hash)->first();

        if (is_null($authUrl)) {
            return false;
        }

        $authUrl->delete();

        return true;
    }

}