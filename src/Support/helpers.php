<?php

if ( ! function_exists('css_route_active')) {

    /**
     * Generate html element class if route is equals to a given route.
     *
     * @param  string $route
     * @param  string $className
     *
     * @return string
     */
    function css_route_active($route, $className = 'active')
    {
        return Route::currentRouteName() == $route ? $className : '';
    }
}

if ( ! function_exists('css_resource_active')) {

    /**
     * Generate html element class if route is in a given resource.
     *
     * @param  string $resource
     * @param  array $routes
     * @param  string $className
     *
     * @return string
     */
    function css_resource_active($resource, $routes = [], $className = 'active')
    {
        $routes = array_merge($routes, ['index', 'store', 'create', 'show', 'destroy', 'update', 'edit']);

        foreach ($routes as $route) {
            if (Route::currentRouteName() == ($resource.'.'.$route)) {
                return $className;
            }
        }

        return '';
    }
}
