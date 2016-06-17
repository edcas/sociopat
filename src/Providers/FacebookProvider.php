<?php

namespace Skvn\Sociopat\Providers;

use Laravel\Socialite\Two\FacebookProvider as Provider;
use Skvn\Sociopat\Contracts\CanPost;


class FacebookProvider extends Provider implements CanPost
{

    public $publishScopes = ['publish_actions'];
    protected $scopes = ['email','publish_actions'];

    /**
     * @inheritdoc
     */
    public function post()
    {
        // TODO: Implement post() method.
    }

   
}