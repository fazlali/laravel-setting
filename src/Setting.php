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
        $value = serialize($value);
        if(! $setting = \DB::table('settings')->where(compact('key'))->first()){
           \DB::table('settings')->insert(compact('key', 'value'));
        }
        else{
           \DB::table('settings')->where(compact('key'))->update(compact('value'));
        }
        return unserialize($value);
    }

    public function get($key, $default = null)
    {
        if(! $setting = \DB::table('settings')->where(compact('key'))->first()){
            return config($key, $default);
        }
        return unserialize($setting->value);

    }
}