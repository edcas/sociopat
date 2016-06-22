<?php

namespace Skvn\Sociopat;



trait ExtraConfigTrait
{
    protected $extraConfigArray;

    public function setExtraConfig($config)
    {
        $this->extraConfigArray = $config;
        return $this;
    }

    protected function getExtraConfig($key = null, $default = null)
    {
        return $key ? array_get($this->extraConfigArray, $key, $default) : $this->extraConfigArray;
    }

}
