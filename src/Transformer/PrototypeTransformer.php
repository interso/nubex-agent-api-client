<?php

namespace Interso\NubexAgentAPI\Transformer;

use Interso\NubexAgentAPI\DTO\PrototypeDTO;

class PrototypeTransformer
{
    public function transform($data)
    {
        $proto = new PrototypeDTO();

        $id     = isset($data['id'])    ? $data['id']       : null;
        $code   = isset($data['code'])  ? $data['code']     : null;
        $site   = isset($data['site'])  ? $data['site']     : null;
        $state  = isset($data['state']) ? $data['state']    : null;
        $url    = isset($data['url'])   ? $data['url']      : null;
        $md5    = isset($data['md5'])   ? $data['md5']      : null;

        $proto->setId($id);
        $proto->setCode($code);
        $proto->setSite($site);
        $proto->setState($state);
        $proto->setUrl($url);
        $proto->setMd5($md5);

        return $proto;
    }
}