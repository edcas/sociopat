<?php

namespace Skvn\Sociopat\Contracts;

interface CanPost
{

    
    /**
     * Make a post (record on the wall or a status)
     * 
     * @return boolean
     */
    public function post();
}
