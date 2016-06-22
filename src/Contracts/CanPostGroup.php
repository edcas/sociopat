<?php

namespace Skvn\Sociopat\Contracts;

use Skvn\Sociopat\SociopatException;

interface CanPostGroup
{


    /**
     * Make a post group or page
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
    public function publishPostGroup($title, $text, $link='',$attaches=null);
}
