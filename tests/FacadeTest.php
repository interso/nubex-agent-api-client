<?php

namespace Interso\Tests;

use Interso\NubexAgentAPI\DTO\PrototypeDTO;
use Interso\NubexAgentAPI\DTO\SiteDTO;
use Interso\NubexAgentAPI\Facade;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    protected function getUrl()
    {
        return 'http://localhost:8020/api/v1';
    }

    protected function getApiKey()
    {
        return '222';
    }

    public function testSiteList()
    {
        $facade = new Facade($this->getUrl(), $this->getApiKey());
        $list = $facade->sites()->getList();
        $this->assertInstanceOf(SiteDTO::class, $list[0]);
    }

    public function testSiteListWithPage()
    {
        $facade = new Facade($this->getUrl(), $this->getApiKey());
        $list = $facade->sites()->getList(1);
        $this->assertInstanceOf(SiteDTO::class, $list[0]);
    }

//    public function testSiteListWithFilter()
//    {
//        $facade = new Facade($this->getUrl(), $this->getApiKey());
//        $list = $facade->sites()->getList(null, 'published');
//        $this->assertEquals('created', $list[0]->getState());
//    }

//    public function testSiteGet()
//    {
//        $facade = new Facade($this->getUrl(), $this->getApiKey());
//        $list = $facade->sites()->get('first_site');
//        $this->assertInstanceOf(SiteDTO::class, $list[0]);
//    }

//    public function testSiteGetState()
//    {
//        $facade = new Facade($this->getUrl(), $this->getApiKey());
//        $state = $facade->sites()->getState('first_site');
//        $this->assertEquals(['state' => 'created'], $state);
//    }

//    public function testPrototypeList()
//    {
//        $facade = new Facade($this->getUrl(), $this->getApiKey());
//        $list = $facade->prototypes()->getList();
//
//        $this->assertInstanceOf(PrototypeDTO::class, $list[0]);
//    }

//    public function testPrototypeListWithFilter()
//    {
//        $facade = new Facade($this->getUrl(), '222');
//        $list = $facade->prototypes()->getList(null, 'created');
//        $this->assertEquals('created', $list[0]->getState());
//    }

//    public function testPrototypeDownload()
//    {
//        $facade = new Facade($this->getUrl(), '222');
//        $proto = $facade->prototypes()->download(1);
//        $this->assertNotEquals(null, $proto);
//    }
}

