<?php


namespace Depakespedro\LaravelAuthUrl\Repositories;

use Depakespedro\LaravelAuthUrl\Contracts\AuthUrlContract;
use Depakespedro\LaravelAuthUrl\Models\AuthUrl;
use Depakespedro\LaravelAuthUrl\Exceptions\NotFoundUserModel;
use Illuminate\Support\Str;

class AuthUrlManager implements AuthUrlContract
{

    public function createAuthUrl($user, array $params = []): AuthUrl
    {
        if (get_class($user) !== app('Depakespedro\LaravelAuthUrl\Models\User')) {
            throw new NotFoundUserModel();
        }

        $authUrl = new AuthUrl();
        $authUrl->user_id = $user->id;
        $authUrl->hash = bcrypt(Str::random(16));
        $authUrl->params = serialize($params);
        $authUrl->save();

        return $authUrl;
    }

}