<?php

return [
    'models' => [

        /**
         * Namespace до модели User
         */
        'user' => 'App\User',
    ],

    'migrations' => [
        /**
         * Название таблицы для хранения ключей разовой авторизации
         */
        'auth_urls' => 'auth_urls',

        /**
         * Название таблицы с пользователями
         */
        'users' => 'users'
    ],

    /**
     * Редиректы при успешной авторизации и ошибочной
     */
    'redirect' => [
        'default' => '/',
        'error' => '/'
    ]
];