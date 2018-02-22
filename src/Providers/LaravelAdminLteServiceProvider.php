<?php

namespace Elnooronline\LaravelAdminLte\Providers;

use Elnooronline\Forms\Bootstrap;
use Illuminate\Support\ServiceProvider;
use Elnooronline\LaravelAdminLte\LaravelAdminLteManager;

class LaravelAdminLteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('adminlte.manager', function() {
            return new LaravelAdminLteManager(config('adminlte'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishBreadcrumbs();
        $this->loadViews();
        $this->loadTranslations();
        $this->publishAssets();
    }

    private function publishConfig()
    {
        $adminltePath = $this->packagePath('config/adminlte.php');
        $breadcrumbsPath = $this->packagePath('config/breadcrumbs.php');

        $this->publishes([
            $adminltePath => config_path('adminlte.php'),
            $breadcrumbsPath => config_path('breadcrumbs.php'),
        ], 'adminlte.config');

        $this->mergeConfigFrom($adminltePath, 'adminlte');
        $this->mergeConfigFrom($breadcrumbsPath, 'breadcrumbs');
    }

    private function publishBreadcrumbs()
    {
        $this->publishes([
            $this->packagePath('routes/breadcrumbs.php') => base_path('routes/breadcrumbs.php'),
        ], 'adminlte.breadcrumbs');
    }

    private function loadViews()
    {
        $this->loadViewsFrom($path = $this->packagePath('resources/views'), 'adminlte');

        $this->publishes([
            $path => base_path('resources/views/vendor/adminlte'),
        ], 'adminlte.views');

        $this->publishes([
            $this->packagePath('resources/stubs/auth/login.blade.php.stub') => base_path('resources/views/auth/login.blade.php'),
            $this->packagePath('resources/stubs/auth/register.blade.php.stub') => base_path('resources/views/auth/register.blade.php'),
            $this->packagePath('resources/stubs/auth/passwords/email.blade.php.stub') => base_path('resources/views/auth/passwords/email.blade.php'),
            $this->packagePath('resources/stubs/auth/passwords/reset.blade.php.stub') => base_path('resources/views/auth/passwords/reset.blade.php'),
            $this->packagePath('resources/stubs/home.blade.php.stub') => base_path('resources/views/home.blade.php'),
        ], 'adminlte.auth');
    }

    private function loadTranslations()
    {
        $this->loadTranslationsFrom($path = $this->packagePath('resources/lang'), 'adminlte');
        $this->publishes([
            $path => base_path('resources/lang/vendor/adminlte'),
        ], 'adminlte.translations');
    }


    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/adminlte'),
        ], 'adminlte.assets');
    }

    private function packagePath($path)
    {
        return __DIR__."/../../$path";
    }
}

