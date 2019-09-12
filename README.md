laravel-adminlte
====
An easy way to integrate [AdminLTE](https://adminlte.io) into your laravel applications.

1. [Introduction](#introduction)
2. [Installation](#installation)
3. [Overriding Laravel Authentication Views](#adminlte-auth)
4. [Configuration](#adminlte-config)
5. [Blade Templates (Layout, Component and Partial Views)](#adminlte-components)
    1. [Main Layout](#adminlte-components-layout)
    2. [Page Component](#adminlte-components-page)
    3. [Box Component](#adminlte-components-box)
    4. [Table Box Component](#adminlte-components-table-box)
    5. [Info Box Component](#adminlte-components-info-box)
6. [[Optional] Overrriding the default views](#adminlte-views)

<a name="intro"></a>
## 1. Introduction
This package depend on other packages under the hood, these packages are:
* [Laravel Breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs)
* [Laracasts Flash](https://github.com/laracasts/flash)

<a name="installation"></a>
## 2. Installation
You can install `laravel-adminlte` using composer cli by running:
```
composer require elnooronline/laravel-adminlte
```
Then run the following command to publish the required assets and files:
```
php artisan vendor:publish --tag=adminlte-assets --tag=adminlte-breadcrumbs --tag=adminlte-config
```

<a name="adminlte-auth"></a>
## 3. Overriding Laravel Authentication Views
After following the steps in [Authentication Quick Start](https://laravel.com/docs/master/authentication#authentication-quickstart)
you can replace the created authentication views by the adminlte views by running the following command:
```
php artisan vendor:publish --tag=adminlte-auth --force
```


<a name="adminlte-config"></a>
## 4. Configuration
After publish the configuration files in step 1 a two configuration files will be published `config/adminlte.php` and `config/breadcrumbs.php`.

```
<?php

// config/adminlte.php

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
         * Supported values are black, black-light, blue, blue-light,
         *  green, green-light, purple, purple-light,
         *  red, red-light, yellow and yello-light.
         */
        'skin' => 'red',

        /*
         * The direction of the dashboard.
         */
        'dir' => 'ltr',

        /*
         * The header items that will be rendered.
         */
        'header' => [
            'items' => [
                'adminlte::layout.header.messages',
                'adminlte::layout.header.notifications',
                'adminlte::layout.header.tasks',
                'adminlte::layout.header.user',
                'adminlte::layout.header.logout',
            ],
        ],

        /*
         * The sidebar items that will be rendered.
         */
        'sidebar' => [
            'items' => [
                'adminlte::layout.sidebar.user-panel',
                'adminlte::layout.sidebar.search-form',
                'adminlte::layout.sidebar.items',
            ],
        ],
    ],

    'urls' => [
        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        |
        | Register here your dashboard main urls, base, logout, login, etc...
        | The options that can be nullable is register and password_request meaning that it can be disabled.
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

```
You can take a look at [Laravel Breadcrumbs Documentation](https://github.com/davejamesmiller/laravel-breadcrumbs#custom-templates) for the configuration details about `config/breadscrumbs.php` file.

<a name="adminlte-components"></a>
## 5. Blade Templates (Layout, Component and Partial Views)
This package include a layout and components that wraps the most of adminlte elements. It is recommended to read more about layouts in [AdminLTE documentation](https://adminlte.io/docs/2.4/layout).
<a name="adminlte-components-layout"></a>
### 1. Main Layout
This is the main Think of the main layout as a container for including your content within adminlte header and sidebar. The following is an example of using the `adminlte::layout.main`:
```
@extends('adminlte::layout.main')

@section('content')
   {-- Content--} 
@endsection
```
> Note: the content will be wrapped automatically within `<div class="content-wrapper"></div>`.

<a name="adminlte-components-page"></a>
### 2. Page Component
The page component is a container for your content that contain `<section class="content-header"></section>` for holding title and breadcrumbs and `<section class="content"></section>` for holding the page content.
Example:
```
@component('adminlte::page', ['title' => 'Home', 'sub_title' => 'Main page...', 'breadcrumb' => 'BREADCRUMB_NAME'])
   The page content... 
@endcomponent
```
Notes:
> The options `sub_title` and `breadcrumb` are optional.

> The page component is responsible for displaying the [flash messages](https://github.com/laracasts/flash).

> The BREADCRMB_NAME is the name of your [defined breadcrumb](https://github.com/davejamesmiller/laravel-breadcrumbs#2-define-your-breadcrumbs) in `routes/breadcrumbs.php` file.

Example with sending data to breadcrmbs:
```
@component('adminlte::page', ['title' => 'Home', 'breadcrumb' => ['home', $user]])
 The page content...
@endcomponent
```
<a name="adminlte-components-box"></a>
### 3. Box Component
The box component is a wrapper for [AdminLTE box](https://adminlte.io/docs/2.4/boxes).
Example code:
```
@component('adminlte::box')
    You're logged in!
@endcomponent
```
A more advanced example:
```
@component('adminlte::box', ['title' => 'Box component (solid)', 'solid' => true, 'style' => 'info'])
    @slot('tools')
        <button class="btn btn-warning">Button</button>
    @endslot
    <p>
        Box component contents...
    </p>
    @slot('footer')
        <p>Box footer</p>
    @endslot
@endcomponent
```
> Note: the supported styles are `default`, `primary`, `info`, `warning`, `success` and `danger`.

<a name="adminlte-components-table-box"></a>
### 4. Table Box Component
The table box component can be used to put a table directly within an adminlte box component.
Example usage:
```
@component('adminlte::table-box', ['collection' => $users])
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
@endcomponent
```
Note:

> The component will automatically render the pagination links.

> You don't need to handle empty collection by yourself, the view will display a helpful message if the collection is empty.

<a name="adminlte-components-info-box"></a>
### 5. Info Box
The info box component is a wrapper for [AdminLTE Info Box](https://adminlte.io/docs/2.4/info-box).
Example usage:
```
@include('adminlte::info-box', [
    'icon_color' => 'blue',
    'icon' => 'thumbs-up',
    'text' => 'likes',
    'number' => '2000',
])
```
Or:
```
@include('adminlte::info-box', [
    'style' => 'red',
    'icon' => 'heart',
    'text' => 'loves',
    'number' => '500000',
    'progress' => 70,
    'progress_description' => '70% of the people loved your project!',
])

```

<a name="adminlte-views"></a>
## 6. [Optional] Overrriding the default views
You are free to modify the package views, If you wish you can run the following command:
```
php artisan vendor:publish --tag=adminlte-views
```
Now, you can edit the views in `resources/views/vendor/adminlte`.
> **Note**: It is **NOT RECOMMENDED** to publish the package views because it will mute any future updates and bugfixes. So do not publish the views unless you **know what you are doing**.



