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
    const BIYCYCLE = 'Bicycle';
    const CAR = 'Car';

    private static $vehicles = [
        self::BIYCYCLE => 'Bicycle',
        self::CAR => 'Car'  
    ]; 

    public static function make(string $type)
    {
        if (isset(self::$vehicles[$type])) {
            return new self::$vehicles[$type];
        }
        
        return new NullObject;
    }
}

echo SimpleFactory::make(SimpleFactory::CAR);