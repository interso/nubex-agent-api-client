<?php

namespace Interso\NubexAgentAPI\Command;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Transformer\PrototypeTransformer;

class PrototypeCommand
{
    /**
     * @var Client
     */
    private $client;

    /**
     * PrototypeCommand constructor.
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

        $data = $this->client->get('prototypes')['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) use (&$t) {
            return $t->transform($datum);
        }, $data);
    }
}