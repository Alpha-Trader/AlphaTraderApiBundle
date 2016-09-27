<?php

namespace Alphatrader\ApiBundle\Api;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class ApiClient
 * @package Alphatrader\ApiBundle\Api
 * @author Tr0nYx
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class ApiClient
{
    const METHODE_GET = 'GET';
    const METHODE_PUT = 'PUT';
    const METHODE_POST = 'POST';
    const METHODE_DELETE = 'DELETE';
    /** @var array */
    protected $validMethods = [
        self::METHODE_GET,
        self::METHODE_PUT,
        self::METHODE_POST,
        self::METHODE_DELETE
    ];

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var Serializer
     */
    protected $serializer;

    protected $config;

    /**
     * @param array $config
     * @param null  $jwt
     */
    public function __construct(array $config = array(), $jwt = null)
    {
        $this->serializer = SerializerBuilder::create()->build();
        $this->config = $config;
        $token = $jwt ?: $config['jwt'] ?: null;
        $this->client = $this->createClient($token);
    }

    /**
     * @param null $token
     *
     * @return Client
     */
    private function createClient($token = null)
    {
        $config = [
            'base_uri' => $this->config['apiurl'] . '/api/',
            'headers'  => [
                'X-Authorization' => $this->config["authid"]
            ]
        ];
        if ($token != null) {
            $config['headers']['Authorization'] = 'Bearer ' . $token;
        }
        return new Client($config);
    }

    /**
     * @param        $url
     * @param string $method
     * @param array  $data
     * @param null   $params
     *
     * @return string
     * @throws \Exception
     */
    public function request($url, $method = self::METHODE_GET, $data = array(), $params = null)
    {
        if (!in_array($method, $this->validMethods)) {
            throw new \Exception('Invalid HTTP-Method: ' . $method);
        }
        $queryString = '';
        if (!empty($params)) {
            $queryString = http_build_query($params);
        }
        $url = rtrim($url, '?') . '?';
        $url = $url . $queryString;

        try {
            $request = $this->client->request($method, $url, $data);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $request = $e->getResponse();
        }

        return $request->getBody()->getContents();
    }

    /**
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    public function get($url, $params = array())
    {
        return $this->request($url, self::METHODE_GET, array(), $params);
    }

    /**
     * @param       $url
     * @param array $data
     * @param array $params
     *
     * @return string
     */
    public function post($url, $data = array(), $params = array())
    {
        return $this->request($url, self::METHODE_POST, $data, $params);
    }

    /**
     * @param       $url
     * @param array $data
     * @param array $params
     *
     * @return string
     */
    public function put($url, $data = array(), $params = array())
    {
        return $this->request($url, self::METHODE_PUT, $data, $params);
    }

    /**
     * @param       $url
     * @param array $params
     *
     * @return string
     */
    public function delete($url, $params = array())
    {
        return $this->request($url, self::METHODE_DELETE, array(), $params);
    }
}
