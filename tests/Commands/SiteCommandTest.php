<?php

namespace Interso\Tests\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Command\SiteCommand;
use Interso\NubexAgentAPI\DTO\SiteDTO;
use PHPUnit\Framework\TestCase;

class SiteCommandTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var SiteCommand
     */
    protected $siteCommand;

    /**
     * Tear down settings
     */
    protected function tearDown()
    {
        $this->siteCommand = NULL;
    }

    /**
     * Set up settings
     */
    protected function setUp()
    {
        $data['data'][0] = [
            'id'        => 1,
            'code'      => 2,
            'prototype' => 3,
            'state'     => 'new',
        ];

        $this->client = $this->createMock(Client::class);
        $this->client->expects($this->any())
            ->method('get')
            ->will($this->returnValue($data));

        $this->siteCommand = new SiteCommand($this->client);
    }

    public function testGetList()
    {
        $dto = new SiteDTO();
        $dto->setId(1);
        $dto->setCode(2);
        $dto->setPrototype(3);
        $dto->setState('new');

        $this->assertEquals($dto, $this->siteCommand->getList()[0]);
    }

    public function testGetListType()
    {
        $this->assertInstanceOf(SiteDTO::class, $this->siteCommand->getList()[0]);
    }
}