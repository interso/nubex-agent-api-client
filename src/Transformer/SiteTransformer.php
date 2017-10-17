<?php

namespace Interso\NubexAgentAPI\Transformer;

use Interso\NubexAgentAPI\DTO\SiteDTO;

class SiteTransformer
{
    public function transform($data)
    {
        $site = new SiteDTO();

        $site->setId($data['id']);
        $site->setCode($data['code']);
        $site->setPrototype($data['prototype']);

        return $site;
    }
}