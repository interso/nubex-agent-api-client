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
     * @var SiteTransformer
     */
    private $transformer;

    /**
     * SiteCommand constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->transformer = new SiteTransformer();
    }

    public function getList($page = null, $filter = null)
    {
        $page ? $endpoint = 'sites/' . $page : $endpoint = 'sites';
        $filter ? $endpoint .= '?filter=' . $filter : 0;

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) {
            return $this->transformer->transform($datum);
        }, $data);
    }

    public function get($code)
    {
        $endpoint = 'site/' . $code;

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) {
            return $this->transformer->transform($datum);
        }, $data);
    }

    public function getState($code)
    {
        $endpoint = 'site/' . $code . '/status';

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return $data;
    }
}