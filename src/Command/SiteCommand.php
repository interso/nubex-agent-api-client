<?php

namespace Interso\NubexAgentAPI\Command;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Transformer\SiteTransformer;

class SiteCommand
{
    /**
     * @var Client
     */
    private $client;

    /**
     * SiteCommand constructor.
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