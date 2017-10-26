<?php

namespace Interso\NubexAgentAPI\DTO;

class PrototypeDTO
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
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
     * @var string
     */
    private $md5;

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

    /**
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * @param string $md5
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
    }
}