<?php

namespace Interso\NubexAgentAPI\Transformer;

use Interso\NubexAgentAPI\DTO\SiteDTO;

class SiteTransformer
{
    public function transform($data)
    {
        $site = new SiteDTO();

        $id         = isset($data['id'])        ? $data['id']        : null;
        $code       = isset($data['code'])      ? $data['code']      : null;
        $state      = isset($data['state'])     ? $data['state']     : null;
        $prototype  = isset($data['prototype']) ? $data['prototype'] : null;

        $site->setId($id);
        $site->setCode($code);
        $site->setState($state);
        $site->setPrototype($prototype);

        return $site;
    }
}