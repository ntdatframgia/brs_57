<?php

namespace App\Facades\CustomFacade;

use Illuminate\Support\Facades\Facade;

class CustomUpload extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CustomUpload';
    }
}
