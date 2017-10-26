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

    public function testSiteListWithPage()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $list = $facade->sites()->getList(1);
        $this->assertInstanceOf(SiteDTO::class, $list[0]);
    }

    public function testSiteListWithFilter()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $list = $facade->sites()->getList(null, 'created');
        $this->assertEquals('created', $list[0]->getState());
    }

    public function testSiteGet()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $list = $facade->sites()->get(1);
        $this->assertInstanceOf(SiteDTO::class, $list[0]);
    }

    public function testSiteGetState()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $state = $facade->sites()->getState(1);
        $this->assertEquals(['state' => 'new'], $state);
    }

    public function testPrototypeList()
    {
        $facade = new Facade('http://symfony4.app/api/v1', '222');
        $list = $facade->prototypes()->getList();

        var_dump($list);
        
        $this->assertInstanceOf(PrototypeDTO::class, $list[0]);
    }

//    public function testPrototypeListWithFilter()
//    {
//        $facade = new Facade('http://symfony4.app/api/v1', '222');
//        $list = $facade->prototypes()->getList(null, 'created');
//        $this->assertEquals('created', $list[0]->getState());
//    }

//    public function testPrototypeDownload()
//    {
//        $facade = new Facade('http://symfony4.app/api/v1', '222');
//        $proto = $facade->prototypes()->download(1);
//        $this->assertNotEquals(null, $proto);
//    }
}

