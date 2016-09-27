<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AlphatraderApiBundleTest extends TestCase
{
    public function test_build()
    {
        $container = new ContainerBuilder();
        self::assertInstanceOf(ContainerBuilder::class,$container);
    }
}
