<?php

namespace Skvn\Sociopat;


use Laravel\Socialite\SocialiteManager;


class SociopatManager extends SocialiteManager
{

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createFacebookDriver()
    {
        $config = $this->app['config']['services.facebook'];

        return $this->buildProvider(
            __NAMESPACE__.'\Providers\FacebookProvider', $config
        );
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createVkontakteDriver()
    {
        $config = $this->app['config']['services.facebook'];

        return $this->buildProvider(
            '', $config
        );
    }


}
