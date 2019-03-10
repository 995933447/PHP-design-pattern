<?php 

interface Message
{
    public function say(): string;
}

class Hello implements Message
{
    public function say(): string 
    {
        return 'Hello';
    }
}

class World implements Message
{
    public function say(): string 
    {
        return 'world';
    }
}

class Facade
{
    private $hello;

    private $world;

    public function __construct(Hello $hello, World $world)
    {
        $this->hello = $hello;
        $this->world = $world;
    }

    public function sayHelloWorld(): string 
    {
        $message = [$this->hello->say(), $this->world->say()];
        return implode(' ', $message);
    }
}