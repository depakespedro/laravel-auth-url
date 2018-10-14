<?php


namespace Depakespedro\LaravelAuthUrl\Repositories;

use Depakespedro\LaravelAuthUrl\Contracts\AuthUrlContract;
use Depakespedro\LaravelAuthUrl\Models\AuthUrl;
use Depakespedro\LaravelAuthUrl\Exceptions\NotFoundUserModel;

class AuthUrlRepository implements AuthUrlContract
{
    //выдает моедель хеша
    public function createAuthUrl($user, array $params = []): AuthUrl
    {
        if (get_class($user) !== app('Depakespedro\LaravelAuthUrl\Models\User')) {
            throw new NotFoundUserModel();
        }

        return new AuthUrl();
    }

}