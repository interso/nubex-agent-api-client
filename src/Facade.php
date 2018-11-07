<?php

namespace Interso\NubexAgentAPI;

use GuzzleHttp\Client as HttpClient;

use Interso\NubexAgentAPI\Service\PrototypeService;
use Interso\NubexAgentAPI\Service\SiteService;

class Facade
{
    /** @var string */
    protected $apiUrl;

    /** @var string */
    protected $apiKey;

    /** @var Client */
    protected $client;

    /** @var SiteService */
    protected $siteService;

    /** @var PrototypeService */
    protected $prototypeService;

    /**
     * Facade constructor.
     *
     * @param string $apiUrl
     * @param string $apiKey
     */
    public function __construct($apiUrl, $apiKey)
    {
        $httpClient = new HttpClient();
        $client = new Client($apiUrl, $apiKey, $httpClient);

        $this->siteService      = new SiteService($client);
        $this->prototypeService = new PrototypeService($client);
    }

    /**
     * @return SiteService
     */
    public function sites()
    {
        return $this->siteService;
    }

    /**
     * @return PrototypeService
     */
    public function prototypes()
    {
        return $this->prototypeService;
    }
}