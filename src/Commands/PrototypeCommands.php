<?php

namespace Interso\NubexAgentAPI\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\DTO\PrototypeDTO;
use Interso\NubexAgentAPI\Transformer\PrototypeTransformer;

class PrototypeCommands
{
    /**
     * @var Client
     */
    private $client;

    /**
     * PrototypeCommands constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getList()
    {
        $t = new PrototypeTransformer();
        $data = $this->client->get('prototypes');
        return !is_array($data) ? [] : $t->transform($data);
    }
}