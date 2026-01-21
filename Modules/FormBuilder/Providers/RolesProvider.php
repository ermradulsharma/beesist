<?php

namespace Modules\FormBuilder\Providers;

use Illuminate\Support\ServiceProvider;

class RolesProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            1 => 'Default',
        ];
    }
}
