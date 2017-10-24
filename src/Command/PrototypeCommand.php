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
     * @var PrototypeTransformer
     */
    private $transformer;

    /**
     * PrototypeCommand constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->transformer = new PrototypeTransformer();
    }

    public function getList($page = null, $filter = null)
    {
        $page ? $endpoint = 'prototypes/' . $page : $endpoint = 'prototypes';
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
        $endpoint = 'prototype/' . $code;

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) {
            return $this->transformer->transform($datum);
        }, $data);
    }
}