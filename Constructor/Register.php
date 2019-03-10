<?php
interface Pool
{
    public function set(string $key, $value);

    public function get(string $key);
}

class NullObject 
{
    public function __call($method, $arguments)
    {
        print 'do not thing';
    }
}

class Objpool implements Pool
{
    private $pool;

    public function set(string $key, $value)
    {
        if (!is_object($value)) 
            throw new InvalidArgumentException('Second argument must be a object');

        $this->pool[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->pool[$key]?? new NullObject;
    }
}

(new Objpool)->set('std', new StdClass);