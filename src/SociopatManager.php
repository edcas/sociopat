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

        return $this->buildProvider(
            __NAMESPACE__.'\Providers\FacebookProvider', $this->app['config']['services.facebook']
        ) -> setExtraConfig($this->app['config']['sociopat.facebook']);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createVkontakteDriver()
    {

        return $this->buildProvider(
            __NAMESPACE__.'\Providers\VkontakteProvider', $this->app['config']['services.vkontakte']
            )
                -> setExtraConfig($this->app['config']['sociopat.vkontakte']);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createOdnoklassnikiDriver()
    {

        return $this->buildProvider(
            __NAMESPACE__.'\Providers\OdnoklassnikiProvider', $this->app['config']['services.odnoklassniki']
        ) -> setExtraConfig($this->app['config']['sociopat.odnoklassniki']);
    }


}
