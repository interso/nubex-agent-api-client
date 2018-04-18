<?php

namespace Interso\NubexAgentAPI\Service;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Transformer\PrototypeTransformer;

class PrototypeService
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
        $page
            ? $endpoint = sprintf('prototypes/%s', $page)
            : $endpoint = 'prototypes';

        $filter
            ? $endpoint = sprintf('%s?filter=%s', $endpoint, $filter)
            : null;

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
        $endpoint = sprintf('prototype/%s', $code);

        $data = $this->client->get($endpoint)['data'];
        if (!is_array($data)) {
            return [];
        }

        return array_map(function ($datum) {
            return $this->transformer->transform($datum);
        }, $data);
    }
}