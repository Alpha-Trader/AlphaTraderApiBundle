<?php

namespace Tests;

use Alphatrader\ApiBundle\Api\ApiClient;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class ApiClientTest extends TestCase
{
    const TEST_URL = 'http://127.0.0.1:8008';
    const TEST_URL_400 = 'http://127.0.0.1:8008/400';
    const SAMPLE_JSON_HEADER =
        "HTTP/1.1 200 OK
        Content-Type: application/json
        Connection: keep-alive
        Transfer-Encoding: chunked\r\n";
    private $config = ['user'=>'demo','pass'=>'pass','authid'=>'authid','jwt'=>'jwt.test.123','apiurl'=>'http://www.example.com'];

    /**
     * @var ApiClient
     */
    private $client;

    private $url = 'http://example.com/';

    const SAMPLE_JSON_RESPONSE = '[{"content":{"buyerSecuritiesAccount":"70e12a33-0a50-45dc-916d-d653fa1701d7","sellerSecuritiesAccount":"c07e8708-096b-4799-9492-4c68125979e2","price":100,"volume":10000,"securityIdentifier":"BOT0A200","numberOfShares":100,"date":1474107312932,"id":"8569e994-d6db-4347-90f8-f10694b409be"},"date": 1474107312937,"realms":["8569e994-d6db-4347-90f8-f10694b409be","70e12a33-0a50-45dc-916d-d653fa1701d7","c07e8708-096b-4799-9492-4c68125979e2","BOT0A200"],"type":"SECURITY_TRADED"}]';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->client = new ApiClient($this->config);
    }

    public function test_createClient()
    {
        self::assertInstanceOf(ApiClient::class, $this->client);
    }

    public function test_Methods()
    {
        $valid_methods = array('get', 'post', 'delete', 'put');
        foreach ($valid_methods as $method) {
            $html = $this->client->$method($this->url);
            if ($method == 'post') {
                $html = $this->client->$method($this->url,['test'=>'test'],['test'=>'test']);
            }
            $crawler = new Crawler($html->getBody()->getContents());
            if ($method == 'get' || $method == 'post') {
                $this->assertEquals(1, $crawler->filter('body')->count());
            }
            if ($method == 'delete' || $method == 'put') {
                $this->assertEquals("", $html->getBody()->getContents());
            }
        }
    }

    public function test_request()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid HTTP-Method: FAILMETHOD');
        $this->client->request($this->url, 'FAILMETHOD');
    }
}
