<?php

namespace Interso\NubexAgentAPI\Transformer;

use Interso\NubexAgentAPI\DTO\PrototypeDTO;

class PrototypeTransformer
{
    public function transform($data)
    {
        $proto = new PrototypeDTO();

        $proto->setId($data['id']);
        $proto->setCode($data['code']);
        $proto->setSite($data['site']);
        $proto->setState($data['state']);
        $proto->setDownload($data['download']);
        $proto->setMd5($data['md5']);

        return $proto;
    }
}