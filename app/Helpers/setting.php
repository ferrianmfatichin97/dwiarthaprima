<?php

if (!function_exists('setting')) {
    function setting($page, $key, $default = null) {
        $setting = \App\Models\PageSetting::where('page', $page)->where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
