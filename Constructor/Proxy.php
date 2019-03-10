<?php 

abstract class Proxy
{
    abstract protected function proxySubject(): string;

    public function __call($method, $arguments)
    {
        $class = $this->proxySubject();
        return (new $class)->{$method}(...$arguments);
    }
}

class Car
{
    public function say()
    {
        print 'I am a car'.
    }
}

class CarProxy extends proxySubject
{
    protected function proxySubject(): string 
    {
        return 'Car';
    }
}