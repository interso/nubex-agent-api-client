<?php

namespace Interso\NubexAgentAPI\Service;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\DTO\SiteDTO;
use Interso\NubexAgentAPI\Transformer\SiteTransformer;

class SiteService
{
    /** @var Client */
    private $client;

    /** @var SiteTransformer */
    private $transformer;

    /**
     * SiteCommand constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->transformer = new SiteTransformer();
    }

    /**
     * @param string $page
     * @param string $filter
     * @return SiteDTO[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($page = null, $filter = null)
    {
        $page
            ? $endpoint = sprintf('sites/%s', $page)
            : $endpoint = 'sites';

        $filter
            ? $endpoint = sprintf('%s?filter=%s', $endpoint, $filter)
            : null;

        $result = $this->client->get($endpoint);
        if (!$result || !isset($result['data']) || !is_array($result['data'])) {
            return [];
        }

        return array_map(function ($datum) {
            return $this->transformer->transform($datum);
        }, $result['data']);
    }

    /**
     * @param string $code
     * @return SiteDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($code)
    {
        $endpoint = sprintf('site/%s', $code);

        $result = $this->client->get($endpoint);
        if (!$result || !isset($result['data'][0])) {
            return null;
        }

        $data = $result['data'][0];
        return $this->transformer->transform($data);
    }

//    /**
//     * @param string $code
//     * @return array
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     */
//    public function getState($code)
//    {
//        $endpoint = sprintf('site/%s/status', $code);
//
//        $data = $this->client->get($endpoint)['data'];
//        if (!is_array($data)) {
//            return [];
//        }
//
//        return $data;
//    }
}