<?php

namespace Interso\Tests\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Commands\SiteCommands;
use Interso\NubexAgentAPI\DTO\SiteDTO;
use PHPUnit\Framework\TestCase;

class SiteCommandsTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var SiteCommands
     */
    protected $siteCommands;

    /**
     * Tear down settings
     */
    protected function tearDown()
    {
        $this->siteCommands = NULL;
    }

    /**
     * Set up settings
     */
    protected function setUp()
    {
        $data = [
            'id'        => 1,
            'code'      => 2,
            'prototype' => 3,
        ];

        $this->client = $this->createMock(Client::class);
        $this->client->expects($this->any())
            ->method('get')
            ->will($this->returnValue($data));

        $this->siteCommands = new SiteCommands($this->client);
    }

    public function testGetList()
    {
        $dto = new SiteDTO();
        $dto->setId(1);
        $dto->setCode(2);
        $dto->setPrototype(3);

        $this->assertEquals($dto, $this->siteCommands->getList());
    }

    public function testGetListType()
    {
        $this->assertInstanceOf(SiteDTO::class, $this->siteCommands->getList());
    }
}