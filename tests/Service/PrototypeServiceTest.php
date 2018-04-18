<?php

namespace Interso\Tests\Commands;

use Interso\NubexAgentAPI\Client;
use Interso\NubexAgentAPI\Service\PrototypeService;
use Interso\NubexAgentAPI\DTO\PrototypeDTO;

use PHPUnit\Framework\TestCase;

class PrototypeServiceTest extends TestCase
{
    /** @var Client */
    protected $client;

    /** @var PrototypeService */
    protected $protoCommand;

    /** Tear down settings */
    protected function tearDown()
    {
        $this->protoCommand = NULL;
    }

    /** Set up settings */
    protected function setUp()
    {
        $data['data'][0] = [
            'id'   => 3,
            'code' => 2,
            'site' => 1,
            'state' => 'new',
            'url' => 'url',
            'md5' => '5',
        ];

        $this->client = $this->createMock(Client::class);
        $this->client->expects($this->any())
            ->method('get')
            ->will($this->returnValue($data));

        $this->protoCommand = new PrototypeService($this->client);
    }

    public function testGetList()
    {
        $dto = new PrototypeDTO();
        $dto->setId(3);
        $dto->setCode(2);
        $dto->setSite(1);
        $dto->setState('new');
        $dto->setUrl('url');
        $dto->setMd5('5');

        $this->assertEquals($dto, $this->protoCommand->getList()[0]);
    }

    public function testGetListType()
    {
        $this->assertInstanceOf(PrototypeDTO::class, $this->protoCommand->getList()[0]);
    }
}