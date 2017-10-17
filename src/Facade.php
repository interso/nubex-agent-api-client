<?php

namespace Interso\NubexAgentAPI;

use GuzzleHttp\Client as HttpClient;
use Interso\NubexAgentAPI\Commands\PrototypeCommands;
use Interso\NubexAgentAPI\Commands\SiteCommands;

class Facade
{
    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var SiteCommands
     */
    protected $siteCommands;

    /**
     * @var PrototypeCommands
     */
    protected $prototypeCommands;

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

        $this->siteCommands      = new SiteCommands($client);
        $this->prototypeCommands = new PrototypeCommands($client);
    }

    /**
     * @return SiteCommands
     */
    public function sites()
    {
        return $this->siteCommands;
    }

    /**
     * @return PrototypeCommands
     */
    public function prototypes()
    {
        return $this->prototypeCommands;
    }
}