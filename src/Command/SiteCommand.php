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

    public function getList($page = null)
    {
        $t = new SiteTransformer();

        if ($page !== null) {
            $endpoint = 'sites/' . $page;
        } else {
            $endpoint = 'sites';
        }

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) use (&$t) {
            return $t->transform($datum);
        }, $data);
    }
}