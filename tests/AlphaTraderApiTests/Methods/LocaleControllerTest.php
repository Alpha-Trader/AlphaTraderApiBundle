<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 21:53
 */

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\LocaleController;

/**
 * Class LocaleControllerTest
 * @package Tests\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class LocaleControllerTest extends BaseTestCase
{
    public function testGetLocaleFromCurrentUser()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\LocaleController');
        $request->method('getLocaleFromCurrentUser')->willReturn($expected);

        $localeController = new LocaleController($this->config);
        $localeController->setClient($this->getClient($expected));
        try {
            $value = $localeController->getLocaleFromCurrentUser();
        } catch (\RuntimeException $value) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $value);
        }
    }

    public function testSetLocale()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\LocaleController');
        $request->method('setLocale')->willReturn($expected);

        $localeController = new LocaleController($this->config);
        $localeController->setClient($this->getClient($expected));
        try {
            $value = $localeController->setLocale('de_DE');
        }catch (\RuntimeException $value){
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $value);
        }
    }

    public function testGetLocales()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\LocaleController');
        $request->method('getLocales')->willReturn($expected);

        $localeController = new LocaleController($this->config);
        $localeController->setClient($this->getClient($expected));
        try {
                $value = $localeController->getLocales();
        } catch (\RuntimeException $value) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $value);
        }
        $this->assertTrue(is_array($value));
    }
}
