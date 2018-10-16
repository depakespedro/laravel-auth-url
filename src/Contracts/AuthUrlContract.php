<?php
declare(strict_types=1);

namespace Depakespedro\LaravelAuthUrl\Contracts;

use Depakespedro\LaravelAuthUrl\Exceptions\NotFoundUserModel;
use Depakespedro\LaravelAuthUrl\Models\AuthUrl;

interface AuthUrlContract
{
    /**
     * Создает и сохраняет модель авторизации по ссылке
     * @param $user
     * @param string $redirect
     * @param array $params
     * @return AuthUrl
     * @throws NotFoundUserModel
     */
    public function createUrl($user, string $redirect = null, array $params = []): AuthUrl;

    /**
     * Проверяет переданный хеш на способность к авторизации
     * @param string $hash
     * @return AuthUrl|null
     */
    public function checkHash(string $hash): ?AuthUrl;

    /**
     *  Удаляет хеш из списка бд
     * @param string $hash
     * @return bool
     */
    public function deleteHash(string $hash): bool;
}