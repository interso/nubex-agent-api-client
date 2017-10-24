<?php

namespace Interso\NubexAgentAPI\DTO;

class PrototypeDTO
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
    private $site;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $download;

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
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param int $site
     */
    public function setSite($site)
    {
        $this->site = $site;
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

    /**
     * @return string
     */
    public function getDownload()
    {
        return $this->download;
    }

    /**
     * @param string $download
     */
    public function setDownload($download)
    {
        $this->download = $download;
    }
}