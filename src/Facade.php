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
    protected $siteCommand;

    /** @var PrototypeService */
    protected $prototypeCommand;

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

        $this->siteCommand      = new SiteService($client);
        $this->prototypeCommand = new PrototypeService($client);
    }

    /**
     * @return SiteService
     */
    public function sites()
    {
        return $this->siteCommand;
    }

    /**
     * @return PrototypeService
     */
    public function prototypes()
    {
        return $this->prototypeCommand;
    }
}