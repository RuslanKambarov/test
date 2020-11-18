<?php

namespace App\Product\Facade;

use Illuminate\Support\Facades\Facade;

Class Product extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'product';
    }
}