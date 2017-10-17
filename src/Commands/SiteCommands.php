<?php

namespace Interso\NubexAgentAPI\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\DTO\SiteDTO;

class SiteCommands
{
    /**
     * @var Client
     */
    private $client;

    /**
     * SiteCommands constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getList()
    {
        $data = $this->client->get('sites');
        return !is_array($data) ? [] : $this->siteTransform($data);
    }

    protected function siteTransform($data)
    {
        $site = new SiteDTO();

        $site->setId($data['id']);
        $site->setCode($data['code']);
        $site->setPrototype($data['prototype']);

        return $site;
    }
}