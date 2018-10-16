<?php

namespace Depakespedro\LaravelAuthUrl\Models;

use Illuminate\Database\Eloquent\Model;

class AuthUrl extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('auth_url.migration.auth_urls'));
    }

    public function user()
    {
        return $this->belongsTo(app('Depakespedro\LaravelAuthUrl\Models\User'));
    }

    public function getUrlAuth()
    {
        return route('auth.url', ['hash' => $this->attributes['hash']]);
    }

    public function getUrlRedirect()
    {
        $params = unserialize($this->attributes['params']);
        $query_params = http_build_query($params);

        return $this->attributes['redirect'] . '?' . $query_params;
    }
}
