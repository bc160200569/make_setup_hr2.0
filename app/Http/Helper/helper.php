<?php

use App\Models\Navigation;
use App\Models\SubNavigation;

if (!function_exists('navbar')) {
    function navbar()
    {
        $data = Navigation::where('is_active', 1)->get();
        return $data;
    }
}
if (!function_exists('subnav')) {
    function subnav()
    {
        $data = SubNavigation::where('is_active', 1)->get();
        return $data;
    }
}