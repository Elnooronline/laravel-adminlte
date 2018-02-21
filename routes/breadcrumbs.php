<?php


Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('tasks', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tasks', route('tasks'));
});
