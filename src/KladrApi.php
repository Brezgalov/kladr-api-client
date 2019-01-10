<?php

namespace brezgalov\KladrApiClient;

use brezgalov\ApiWrapper\Client;

class KladrApi extends Client
{
    /**
     * @var string
     */
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath()
    {
        return 'http://kladr-api.com/api.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getAccessToken()
    {
        return $this->token;
    }

    /**
     * @param array $params
     * @return array|null
     * @throws \Exception
     */
    public function search(array $params)
    {
        $params['token'] = $this->getAccessToken();
        return $this->prepareRequest('')->setQueryParams($params)->execJson();
    }
}