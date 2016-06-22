<?php

namespace Skvn\Sociopat\Providers;

use Skvn\Sociopat\ConfigTrait;
use Skvn\Sociopat\Contracts\CanPostGroup;
use Skvn\Sociopat\ExtraConfigTrait;
use Skvn\Sociopat\SociopatException;
use SocialiteProviders\VKontakte\Provider;
use Skvn\Sociopat\Contracts\CanPost;


class VkontakteProvider extends Provider implements CanPost, CanPostGroup
{

    use ExtraConfigTrait;    
    
    protected $apiEndpoint = "https://api.vk.com/method/";
    //public $publishScopes = ['wall','offline','notes'];


    /**
     * Re-request a permission.
     *
     * @var bool
     */
    protected $reRequest = false;


    /**
     * {@inheritdoc}
     */
    protected function getCodeFields($state = null)
    {
        $fields = parent::getCodeFields($state);


        if ($this->reRequest) {
            $fields['revoke'] = '1';
        }

        return $fields;
    }


    /**
     * {@inheritdoc}
     */
    public function publishPostGroup($title, $text, $link='',$attaches=null)
    {
        
        $info = array(
            'owner_id' => '-'.$this->getExtraConfig('post_group_id'),
            'message' => $text,
            'access_token' => $this->getExtraConfig('post_token')            
        );
        $result = $this->getHttpClient()
                        ->post($this->apiEndpoint.'wall.post',['form_params'=>$info])
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
            'owner_id' => $this->getExtraConfig('post_user_id'),
            'message' => $text,
            'access_token' => $this->getExtraConfig('post_token')
        );
        $result = $this->getHttpClient()
            ->post($this->apiEndpoint.'wall.post',['form_params'=>$info])
            ->getBody()
            ->getContents();

        if (!empty(json_decode($result, true)['error']))
        {
            throw  new SociopatException($result);
        }

    }

    /**
    * Re-request permissions which were previously declined.
    *
    * @return $this
    */
    public function reRequest()
    {
        $this->reRequest = true;
    }


}