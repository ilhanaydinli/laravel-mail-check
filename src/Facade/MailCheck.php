<?php

namespace IlhanAydinli\LaravelMailCheck\Facade;

use Illuminate\Support\Facades\Facade;

class MailCheck extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'mail-check';
    }
}
