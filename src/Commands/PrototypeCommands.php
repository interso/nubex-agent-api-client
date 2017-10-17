<?php

namespace Interso\NubexAgentAPI\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\DTO\PrototypeDTO;

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
        $data = $this->client->get('prototypes');
        return !is_array($data) ? [] : $this->prototypeTransform($data);
    }

    protected function prototypeTransform($data)
    {
        $site = new PrototypeDTO();

        $site->setId($data['id']);
        $site->setCode($data['code']);
        $site->setSite($data['site']);

        return $site;
    }
}