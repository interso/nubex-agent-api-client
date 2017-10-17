<?php

namespace Interso\NubexAgentAPI\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Transformer\SiteTransformer;

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
        $t = new SiteTransformer();
        $data = $this->client->get('sites');
        return !is_array($data) ? [] : $t->transform($data);
    }
}