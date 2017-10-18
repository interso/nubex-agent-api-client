<?php

namespace Interso\NubexAgentAPI\DTO;

class SiteDTO
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $code;

    /**
     * @var integer
     */
    private $prototype;

    /**
     * @var string
     */
    private $state;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getPrototype()
    {
        return $this->prototype;
    }

    /**
     * @param int $prototype
     */
    public function setPrototype($prototype)
    {
        $this->prototype = $prototype;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}