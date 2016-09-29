<?php

namespace Tests\DependencyInjection;

use Alphatrader\ApiBundle\DependencyInjection\AlphatraderApiExtension;
use PHPUnit\Framework\TestCase;

class AlphatraderApiExtensionTest extends TestCase
{
    public function test_getAlias()
    {
        $extension = new AlphatraderApiExtension();
        $this->assertEquals('alphatrader_api',$extension->getAlias());
    }
}