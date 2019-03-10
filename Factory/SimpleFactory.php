<?php
abstract class Vehicle
{
   abstract  public function driveTo(string $destination);

   public function __toString()
   {
       return 'Your vehicle is ' . static::class;
   }
}

class Bicycle extends Vehicle
{
    public function driveTo(string $destination)
    {
        echo "Go to $destination by bicycle";
    }

}

class Car extends Vehicle
{
    public function driveTo(string $destination)
    {
        echo "Go to $destination by car";
    }
}

class NullObject 
{
    public function __call($method, $arguments)
    {
        print 'do not thing';
    }
}

class SimpleFactory
{
    const BIYCYCLE = 0;
    const CAR = 1;

    private $vehicles = [
        self::BIYCYCLE => 'Bicycle',
        self::CAR => 'Car'  
    ]; 

    public function make(string $type)
    {
        if (isset($this->vehicles[$type])) {
            return new $this->vehicles[$type];
        }
        
        return new NullObject;
    }
}

echo (new SimpleFactory)->make(SimpleFactory::CAR);