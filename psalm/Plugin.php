<?php

declare(strict_types=1);

namespace Zlodes\Psalm;

use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;
use SimpleXMLElement;

class Plugin implements PluginEntryPointInterface
{
    public function __invoke(RegistrationInterface $api, SimpleXMLElement $config = null)
    {
        $api->addStubFile(__DIR__ . '/Stubs/DBFacade.phpstub');
    }
}
