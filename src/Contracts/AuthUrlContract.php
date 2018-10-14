<?php


namespace Depakespedro\LaravelAuthUrl\Contracts;

use Depakespedro\LaravelAuthUrl\Models\AuthUrl;

interface AuthUrlContract
{
    //выдает моедель хеша
    public function createAuthUrl($user, array $params = []): AuthUrl;

//    //достает хеш
//    public function getHash($hash);
//
//    //проверяет данный хеш на способность к авторизации
//    public function checkHash(AuthUrl $hash);
//
//    //удаляет хеш
//    public function deleteHash(AuthUrl $hash);
//
//    //связывает хеш и юзера
//    public function linkHashUser(AuthUrl $hash, User $user);
}