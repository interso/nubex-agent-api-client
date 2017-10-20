<?php

namespace Interso\Tests;

use Interso\NubexAgentAPI\DTO\PrototypeDTO;
use Interso\NubexAgentAPI\DTO\SiteDTO;
use Interso\NubexAgentAPI\Facade;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function testSiteList()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $list = $facade->sites()->getList();
        $this->assertInstanceOf(SiteDTO::class, $list[0]);
    }

    public function testPrototypeList()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $list = $facade->prototypes()->getList();
        $this->assertInstanceOf(PrototypeDTO::class, $list[0]);
    }
}

