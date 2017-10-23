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

    public function getList($page = null, $filter = null)
    {
        $t = new SiteTransformer();

        $page ? $endpoint = 'sites/' . $page : $endpoint = 'sites';
        $filter ? $endpoint .= '?filter=' . $filter : 0;

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) use (&$t) {
            return $t->transform($datum);
        }, $data);
    }
}