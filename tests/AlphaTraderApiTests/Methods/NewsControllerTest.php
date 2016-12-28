<?php


namespace AlphaTraderApiTests\Methods;

use Alphatrader\ApiBundle\Api\Methods\NewsController;
use Tests\Methods\BaseTestCase;

/**
 * Class NewsControllerTest
 * @package AlphaTraderApiTests\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class NewsControllerTest extends BaseTestCase
{
    public function testGetHotNews()
    {
        $expected = '[{"root":null,"locale":"en","author":{"username":"test","userCapabilities":{"locale":null,"level2UserEndDate":null,"premiumEndDate":null,"level2User":false,"partner":false,"premium":false},"gravatarHash":"55502f40dc8b7c769880b10874abc9d0","id":"1a1667c5-00b6-4e90-9215-50f849f581e3"},"company":null,"newsPostOrNewsComment":true,"dateCreated":1255241220000,"hashTags":[{"id":"ae73915b-d79c-403f-a678-4dc570380406","tag":"hashtag"}],"title":"A test post","alliance":null,"comment":false,"messageBoard":null,"dateDeleted":1255241340000,"dateEdited":1255241340000,"numberOfDislikes":0,"numberOfLikes":0,"parent":null,"id":"2633e1af-f0f1-4731-96e0-d311cdee6d4a","content":"Test #hashtag"},{"root":null,"locale":"en","author":{"username":"test","userCapabilities":{"locale":null,"level2UserEndDate":null,"premiumEndDate":null,"level2User":false,"partner":false,"premium":false},"gravatarHash":"55502f40dc8b7c769880b10874abc9d0","id":"1a1667c5-00b6-4e90-9215-50f849f581e3"},"company":null,"newsPostOrNewsComment":true,"dateCreated":1255241220000,"hashTags":[{"id":"ae73915b-d79c-403f-a678-4dc570380406","tag":"hashtag"}],"title":"A test post","alliance":null,"comment":false,"messageBoard":null,"dateDeleted":1255241340000,"dateEdited":1255241340000,"numberOfDislikes":0,"numberOfLikes":0,"parent":null,"id":"2633e1af-f0f1-4731-96e0-d311cdee6d4a","content":"Test #hashtag"}]';
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\NewsController');
        $request->method('getHotNews')->willReturn($expected);

        $newsController = new NewsController($this->config);
        $newsController->setClient($this->getClient($expected));

        $data = $newsController->getHotNews(10);
        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Posts',$data);
    }
}
