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

abstract class Factory
{
  abstract public static function make();
}

class CarFactory extends Factory
{
    public static function make()
    {
        return new Car;
    }
}

class BicycleFactory extends Factory
{
    public static function make()
    {
        return new Bicycle;
    }
}


print CarFactory::make();
