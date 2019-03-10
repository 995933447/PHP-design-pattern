<?php 

interface Writer
{
    public function writeCode();
}

class Leader implements Writer
{
    private $developer;

    public function __construct(Writer $developer)
    {
        $this->developer = $developer;
    }

    public function writeCode()
    {
        $this->developer->writeCode();
    }
}

class Developer implements Writer
{
    public function writeCode()
    {
        echo 'Writing bad code.';
    }
}