<?php

return [
    'model' => [

        /**
         * Namespace до модели User
         */
        'User' => 'App\User',
    ],

    'migration' => [
        /**
         * Название таблицы для хранения ключей разовой авторизации
         */
        'auth_urls' => 'auth_urls',

        /**
         * Название таблицы с пользователями
         */
        'users' => 'users'
    ]
];