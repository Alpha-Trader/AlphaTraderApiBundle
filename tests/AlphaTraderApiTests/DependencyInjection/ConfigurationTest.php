<?php

namespace Tests\DependencyInjection;

use Alphatrader\ApiBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function test_getConfigTreeBuilder()
    {
        $configuration = new Configuration();
        $this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\NodeParentInterface', $configuration->getConfigTreeBuilder());
    }
}
