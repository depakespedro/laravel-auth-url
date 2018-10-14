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
}
