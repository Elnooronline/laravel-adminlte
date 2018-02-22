<?php

return [

    /*
     * The logo of the dashboard.
     */
    'logo' => '<b>Laravel</b> AdminLTE',


    /*
     * The small logo of the dashboard.
     */
    'small_logo' => '<b>Lara</b> LTE',

    /*
     * The name of the dashboard.
     */
    'name' => 'Web App Name',

    'appearence' => [
        /*
         * Supported values: black, black-light, blue, blue-light,
         *  green, green-light, purple-light,
         *  red, red-light, yellow and yello-light.
         */
        'skin' => 'red',

        /*
         * The direction of the dashboard.
         */
        'dir' => 'ltr',
    ],

    'header' => [
        'items' => [
            'adminlte::layout.header.items.messages',
            'adminlte::layout.header.items.notifications',
            'adminlte::layout.header.items.tasks',
            'adminlte::layout.header.items.user',
            'adminlte::layout.header.items.logout',
        ],
    ],

    'urls' => [
        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        |
        | Register here your dashboard, logout, login and register URLs. The
        | logout URL automatically sends a POST request in Laravel 5.3 or higher.
        | You can set the request to a GET or POST with logout_method.
        | Set register_url to null if you don't want a register link.
        |
        */
        'base' => '/',
        'logout' => 'logout',
        'login' => 'login',
        'register' => 'register',
        'password_request' => 'password/reset',
        'password_email' => 'password/email',
        'password_reset' => 'password/reset',
    ],
];
