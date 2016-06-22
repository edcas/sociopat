<?php

namespace Skvn\Sociopat\Providers;

use JhaoDa\SocialiteProviders\Odnoklassniki\Provider;
use Skvn\Sociopat\Contracts\CanPost;
use Skvn\Sociopat\ExtraConfigTrait;


class OdnoklassnikiProvider extends Provider implements CanPost
{

    use ExtraConfigTrait;
    
    protected $apiEndpoint = "http://api.odnoklassniki.ru/api";
    

    /**
     * {@inheritdoc}
     */
    public function publishPost($title, $text, $link='',$attaches=null)
    {

        $info = array(
            'application_key' => $this->getExtraConfig('public_key'),
            'format' => "json",
            'linkUrl' => $link,
            'comment' => strip_tags($text)
        );
        $info['sig'] = $this->sign($info, $this->getExtraConfig('post_token'));
        $info['access_token'] = $this->getExtraConfig('post_token');


        $result = $this->getHttpClient()
            ->post($this->apiEndpoint.'/share/addLink',['form_params'=>$info])
            ->getBody()
            ->getContents();

        if (!empty(json_decode($result, true)['error']))
        {
            throw  new SociopatException($result);
        }
        
        


    }//

    protected function sign($args, $token)
    {
        ksort($args);
        $parts = array();
        foreach ($args as $k => $v)
        {
            $parts[] = $k . "=" . $v;
        }
        return strtolower(md5(implode("", $parts).md5($token.$this->clientSecret)));
    }
    
}