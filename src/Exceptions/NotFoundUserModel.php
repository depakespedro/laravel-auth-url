<?php

namespace Depakespedro\LaravelAuthUrl\Exceptions;

class NotFoundUserModel extends \Exception
{
    protected $message = 'Model User not found';
}