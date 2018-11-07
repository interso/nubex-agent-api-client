<?php

namespace Interso\NubexAgentAPI\Service;

use GuzzleHttp\Exception\GuzzleException;
use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\DTO\PrototypeDTO;
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

    /**
     * @param int    $page
     * @param string $filter
     * @return array
     * @throws GuzzleException
     */
    public function getList($page = null, $filter = null)
    {
        $page
            ? $endpoint = sprintf('prototypes/%s', $page)
            : $endpoint = 'prototypes';

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
     * @return PrototypeDTO|null
     * @throws GuzzleException
     */
    public function get($code)
    {
        $endpoint = sprintf('prototype/%s', $code);

        $result = $this->client->get($endpoint);
        if (!$result || !isset($result['data'][0])) {
            return null;
        }

        $data = $result['data'][0];
        return $this->transformer->transform($data);
    }

    /**
     * @param string $code
     * @return string|null
     * @throws GuzzleException
     */
    public function getUrl($code)
    {
        $proto = $this->get($code);
        if (!$proto) {
            return null;
        }

        return $proto->getUrl();
    }

    /**
     * @param string $code
     * @return null|string
     * @throws GuzzleException
     */
    public function getFullUrl($code)
    {
        $url = $this->getUrl($code);
        if (!$url) {
            return null;
        }

        return sprintf('%s%s', $this->client->getBaseUrl(), $url);
    }
}