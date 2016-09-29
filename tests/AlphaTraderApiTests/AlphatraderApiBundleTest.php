<?php

namespace Tests;

use Alphatrader\ApiBundle\AlphatraderApiBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class AlphatraderApiBundleTest extends TestCase
{
    public function test_build()
    {
        $bundle = new AlphatraderApiBundle();
        $this->assertInstanceOf(BundleInterface::class,$bundle);
    }
}
