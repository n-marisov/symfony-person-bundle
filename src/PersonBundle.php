<?php

namespace Maris\Symfony\Person;

use Maris\Symfony\Person\DependencyInjection\PersonExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class PersonBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new PersonExtension();
    }
}