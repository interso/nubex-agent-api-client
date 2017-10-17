<?php

namespace Interso\Tests\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Commands\PrototypeCommands;
use Interso\NubexAgentAPI\DTO\PrototypeDTO;
use PHPUnit\Framework\TestCase;

class PrototypeCommandsTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var PrototypeCommands
     */
    protected $protoCommands;

    /**
     * Tear down settings
     */
    protected function tearDown()
    {
        $this->protoCommands = NULL;
    }

    /**
     * Set up settings
     */
    protected function setUp()
    {
        $data = [
            'id'   => 3,
            'code' => 2,
            'site' => 1,
        ];

        $this->client = $this->createMock(Client::class);
        $this->client->expects($this->any())
            ->method('get')
            ->will($this->returnValue($data));

        $this->protoCommands = new PrototypeCommands($this->client);
    }

    public function testGetList()
    {
        $dto = new PrototypeDTO();
        $dto->setId(3);
        $dto->setCode(2);
        $dto->setSite(1);

        $this->assertEquals($dto, $this->protoCommands->getList());
    }

    public function testGetListType()
    {
        $this->assertInstanceOf(PrototypeDTO::class, $this->protoCommands->getList());
    }
}