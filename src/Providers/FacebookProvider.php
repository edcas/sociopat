<?php

namespace Skvn\Sociopat\Providers;

use Laravel\Socialite\Two\FacebookProvider as Provider;
use Skvn\Sociopat\Contracts\CanPost;
use Skvn\Sociopat\Contracts\CanPostGroup;
use Skvn\Sociopat\ExtraConfigTrait;
use Skvn\Sociopat\SociopatException;


class FacebookProvider extends Provider implements CanPost, CanPostGroup
{

    use ExtraConfigTrait;
    //public $publishScopes = ['publish_actions'];
    protected $apiEndpoint = "https://graph.facebook.com";




    /**
     * {@inheritdoc}
     */
    public function publishPostGroup($title, $text, $link='',$attaches=null)
    {

        $info = array(
            'link' => $link,
            'message' => $text,
            'access_token' => $this->getExtraConfig('page_token')
        );
        $result = $this->getHttpClient()
            ->post($this->apiEndpoint.'/v2.6/'.$this->getExtraConfig('post_page_id').'/feed',['form_params'=>$info])
            ->getBody()
            ->getContents();

        if (!empty(json_decode($result, true)['error']))
        {
            throw  new SociopatException($result);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function publishPost($title, $text, $link='',$attaches=null)
    {

        $info = array(
            'link' => $link,
            'message' => $text,
            'access_token' => $this->getExtraConfig('post_token')
        );


        $result = $this->getHttpClient()
            ->post($this->apiEndpoint.'/v2.6/me/feed',['form_params'=>$info])
            ->getBody()
            ->getContents();

        if (!empty(json_decode($result, true)['error']))
        {
            throw  new SociopatException($result);
        }

    }
}