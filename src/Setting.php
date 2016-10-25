<?php
/**
 * Created by PhpStorm.
 * User: amin
 * Date: 10/25/16
 * Time: 2:32 PM
 */

namespace Fazlali\Setting;


class Setting
{
    public function set($key, $value)
    {
        \DB::table('settings')->updateOrCreate(compact('key'), compact('value'));
        return $value;
    }

    public function get($key, $default = null)
    {
        if(! $setting = \DB::table('settings')->where(compact('key'))->first()){
            return config($key, $default);
        }
        return $setting->value;

    }
}