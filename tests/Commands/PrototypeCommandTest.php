<?php

namespace Interso\Tests\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Command\PrototypeCommand;
use Interso\NubexAgentAPI\DTO\PrototypeDTO;
use PHPUnit\Framework\TestCase;

class PrototypeCommandTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var PrototypeCommand
     */
    protected $protoCommand;

    /**
     * Tear down settings
     */
    protected function tearDown()
    {
        $this->protoCommand = NULL;
    }

    /**
     * Set up settings
     */
    protected function setUp()
    {
        $data['data'][0] = [
            'id'   => 3,
            'code' => 2,
            'site' => 1,
            'state' => 'new',
            'download' => 'url'
        ];

        $this->client = $this->createMock(Client::class);
        $this->client->expects($this->any())
            ->method('get')
            ->will($this->returnValue($data));

        $this->protoCommand = new PrototypeCommand($this->client);
    }

    public function testGetList()
    {
        $dto = new PrototypeDTO();
        $dto->setId(3);
        $dto->setCode(2);
        $dto->setSite(1);
        $dto->setState('new');
        $dto->setDownload('url');

        $this->assertEquals($dto, $this->protoCommand->getList()[0]);
    }

    public function testGetListType()
    {
        $this->assertInstanceOf(PrototypeDTO::class, $this->protoCommand->getList()[0]);
    }
}