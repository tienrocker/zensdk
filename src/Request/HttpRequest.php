<?php
namespace tienrocker\zensdk\Request;

use GuzzleHttp\Client;

class HttpRequest
{
    /**
     * @var HttpRequest
     */
    private static $instance;

    /**
     * @var Client
     */
    private $client;

    /**
     * @return HttpRequest
     */
    public static function instance()
    {
        if (static::$instance == null) static::$instance = new HttpRequest;
        return static::$instance;
    }

    /**
     * HttpRequest constructor.
     */
    public function __construct()
    {
        $config = ["verify" => __DIR__ . "/cert/cacert.pem"];
        $this->client = new Client($config);
    }

    /**
     * @param $url
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRequest($url)
    {
        $response = $this->client->get($url);
        return $response->getBody();
    }
}