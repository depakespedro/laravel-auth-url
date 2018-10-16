# Пакет для разовой авторизации по ссылке

**Установка**

Устанавливаем пакет
```text
composer require depakespedro/laravel-auth-url
```

Добавляем сервис провайдер если требует того версия Laravel в ```config/app.php```
```
Depakespedro\LaravelAuthUrl\Providers\AuthUrlServiceProvider::class
```
Публикуем миграцию и накатываем ее
```text
php artisan vendor:publish --provider='Depakespedro\LaravelAuthUrl\Providers\AuthUrlServiceProvider' --tag=migrations
php artisan migrate
```

Публикуем конфиг
```text
php artisan vendor:publish --provider='Depakespedro\LaravelAuthUrl\Providers\AuthUrlServiceProvider' --tag=config
```

Если требуются правки авторизации, то публикуем контроллер
```text
php artisan vendor:publish --provider='Depakespedro\LaravelAuthUrl\Providers\AuthUrlServiceProvider' --tag=controller
```

**Использование**

Создаем запись в БД для регистрации хеш ключа авторизации c помощью фасада

```php
use Depakespedro\LaravelAuthUrl\Facades\Manager;
$user = App\User::find(1);
$redirectSuccess = '/success';
$paramsQuery = ['foo' => 'bar'];
$authUrlModel = Manager::createUrl($user, $redirectSuccess, $paramsQuery);
```
Получаем экземпляр модели 
```php
Depakespedro\LaravelAuthUrl\Models\AuthUrl
```

Получаем ссылку для авторизации
```php
$authUrl = $authUrlModel->getUrlAuth()
```

Ссылка имеем примерный вид
```text
https://singleauth.dev/auth/url/%242y%2410%240e0U01balNAicGhVBvta0OhJnQDtFr6uEaoz.lVLx2RdmQjeSlE1a
```

При авторизации по ссылке ```$authUrl```  будем перенаправлены на роут вида 
```
/success?foo=bar
```