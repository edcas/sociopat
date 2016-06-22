<?php

namespace Skvn\Sociopat\Contracts;

use Skvn\Sociopat\SociopatException;

/**
 * Interface CanPost
 * @package Skvn\Sociopat\Contracts
 */
interface CanPost
{

    

    /**
     * Make a post (record on the wall or a status)
     * 
     * @param $title
     * @param $text
     * @param $link
     * @param $attaches
     * 
     * @return mixed post id
     * 
     * @throws SociopatException
     */
    public function publishPost($title, $text, $link='',$attaches=null);
}
