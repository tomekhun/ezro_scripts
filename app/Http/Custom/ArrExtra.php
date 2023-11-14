<?php

namespace App\Http\Custom;
use ArrayAccess;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Macroable;
use InvalidArgumentException;

class ArrExtra extends Arr
{
    use Macroable;

    public static function accessible($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }


    public static function addOrPlus(&$array,$key,$value,$overWrite=false) {

        if (is_null(static::get($array, $key))) {
            static::set($array, $key, $value);
        }else{
            if ($overWrite) {
                static::set($array, $key, $value);

            }else{
                static::set($array, $key, static::get($array, $key)+$value);
            }

        }
        return $array;
    }


}
