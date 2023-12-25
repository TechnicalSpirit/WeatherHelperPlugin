<?php

namespace WeatherHelper\Contracts\AbstractClasses;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;

abstract class ServicesManagerAbstract
{
    /**
     * @var ServiceInterface[]
     */
    protected array $services = [];

    public function resisterServices():void
    {
        foreach ($this->services as $service)
        {
            $service->register();
        }
    }
}