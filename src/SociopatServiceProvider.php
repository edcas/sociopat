<?php

namespace Skvn\Sociopat;

use Laravel\Socialite\SocialiteServiceProvider;

class SociopatServiceProvider extends SocialiteServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new SociopatManager($app);
        });
    }

}
