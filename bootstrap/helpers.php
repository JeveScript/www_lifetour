<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function nav_active($route_name){
    $active = Route::currentRouteName() == $route_name ? 'active' : '';
    return $active;
}