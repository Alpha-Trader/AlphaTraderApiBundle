<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljb
 * Date: 09.12.16
 * Time: 11:22
 */

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException;
use Alphatrader\ApiBundle\Api\Methods\CompanyController;

class CompanyControllerTest extends BaseTestCase
{
    public function testGetMyCompanies()
    {
        $json = "{\"content\":[{\"securitiesAccountId\":\"3f936221-c7fa-4eb4-a837-e76864f6e867\",\"logoUrl\":null,\"ceo\":{\"username\":\"skydevment\",\"userCapabilities\":{\"level2UserEndDate\":null,\"premiumEndDate\":null,\"level2User\":false,\"partner\":true,\"premium\":false,\"locale\":\"de_de\"},\"gravatarHash\":\"cd8e6e1791942f87fe9a005a5c39a322\",\"id\":\"d63ceb5d-bcdf-4465-a3f9-dbfcb8ab6c30\"},\"listing\":{\"endDate\":null,\"startDate\":1479848971181,\"securityIdentifier\":\"STB19742\",\"name\":\"Banking Test AG\",\"type\":\"STOCK\"},\"bankAccount\":{\"cash\":48999650,\"id\":\"beb333fb-dd42-4b46-a4a1-7144c434957a\"},\"name\":\"Banking Test AG\",\"id\":\"566bb226-85e8-448b-8100-5e35873b58a4\"},{\"securitiesAccountId\":\"a4c6811b-d040-4ca9-b4fe-aa50eff65ce7\",\"logoUrl\":null,\"ceo\":{\"username\":\"skydevment\",\"userCapabilities\":{\"level2UserEndDate\":null,\"premiumEndDate\":null,\"level2User\":false,\"partner\":true,\"premium\":false,\"locale\":\"de_de\"},\"gravatarHash\":\"cd8e6e1791942f87fe9a005a5c39a322\",\"id\":\"d63ceb5d-bcdf-4465-a3f9-dbfcb8ab6c30\"},\"listing\":{\"endDate\":null,\"startDate\":1479835270208,\"securityIdentifier\":\"STL22561\",\"name\":\"LJB Finance Holding SE\",\"type\":\"STOCK\"},\"bankAccount\":{\"cash\":500150,\"id\":\"bfd16d22-92f8-4e18-a5df-b5d864689fca\"},\"name\":\"LJB Finance Holding SE\",\"id\":\"3b2c7aa7-1c17-4259-8ce1-bd26759a22c6\"},{\"securitiesAccountId\":\"88fa07cb-d7ac-413c-bc01-aa9cbe2bc224\",\"logoUrl\":\"http://fs1.directupload.net/images/160910/x2ov3flr.png\",\"ceo\":{\"username\":\"skydevment\",\"userCapabilities\":{\"level2UserEndDate\":null,\"premiumEndDate\":null,\"level2User\":false,\"partner\":true,\"premium\":false,\"locale\":\"de_de\"},\"gravatarHash\":\"cd8e6e1791942f87fe9a005a5c39a322\",\"id\":\"d63ceb5d-bcdf-4465-a3f9-dbfcb8ab6c30\"},\"listing\":{\"endDate\":null,\"startDate\":1474099171103,\"securityIdentifier\":\"STG3978E\",\"name\":\"georgebest Inc.\",\"type\":\"STOCK\"},\"bankAccount\":{\"cash\":9908.07,\"id\":\"ffe776ae-5e25-472e-9f89-02c251302816\"},\"name\":\"georgebest Inc.\",\"id\":\"b244a8a2-b12e-4dc4-b998-c64e25c5099d\"}],\"last\":true,\"totalPages\":1,\"totalElements\":3,\"sort\":[{\"direction\":\"ASC\",\"property\":\"name\",\"ignoreCase\":false,\"nullHandling\":\"NATIVE\",\"ascending\":true}],\"numberOfElements\":3,\"first\":true,\"size\":10,\"number\":0}";
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\CompanyController');
        $request->method('getMyCompanies')->will($this->returnValue($json));

        $CompanyController = new CompanyController($this->config);
        $CompanyController->setClient($this->getClient($json));
        try {
            $val = $CompanyController->getMyCompanies(1, 1, 1);
            $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompanyPage', $val);
            $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Company', $val->getContent());
        } catch (AlphaTraderApiException $e) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $e->getError());
        }
    }
}
