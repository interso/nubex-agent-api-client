<?php

namespace Interso\NubexAgentAPI;

use GuzzleHttp\Client as HttpClient;
use Interso\NubexAgentAPI\Command\PrototypeCommand;
use Interso\NubexAgentAPI\Command\SiteCommand;

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
     * @var SiteCommand
     */
    protected $siteCommand;

    /**
     * @var PrototypeCommand
     */
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

        $this->siteCommand      = new SiteCommand($client);
        $this->prototypeCommand = new PrototypeCommand($client);
    }

    /**
     * @return SiteCommand
     */
    public function sites()
    {
        return $this->siteCommand;
    }

    /**
     * @return PrototypeCommand
     */
    public function prototypes()
    {
        return $this->prototypeCommand;
    }
}