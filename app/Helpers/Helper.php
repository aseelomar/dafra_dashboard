<?php


use App\Setting;

if (!function_exists('settings')) {
    function settings($key)
    {
        if ($setting = Setting::where('key', $key)->first()) {
            return $setting->value;
        }

        return '';
    }
}
