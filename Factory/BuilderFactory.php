<?php

abstract class Vehicle
{
    abstract public function setPart(string $attribute, $value);  
}

class Car extends Vehicle
{
    private $attributes = [];

    public function setPart(string $attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }
}

abstract class VehicleBuilder
{
    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    abstract public function addWheels();

    abstract public function addDoors();

    public function create()
    {
        return $this->vehicle;
    }
}

class CarBuilder extends VehicleBuilder
{

    public function addDoors()
    {
        $this->vehicle->setPart('rightDoor', 'small size');
        $this->vehicle->setPart('leftDoor', 'small size');
        $this->vehicle->setPart('trunkLid', 'big size');
    }

    public function addWheels()
    {
        $this->vehicle->setPart('wheelLF', 'front');
        $this->vehicle->setPart('wheelRF', 'front');
        $this->vehicle->setPart('wheelLR', 'after');
        $this->vehicle->setPart('wheelRR', 'after');
    }

}

class Factory
{
    public function make(VehicleBuilder $buidler)
    {
        $buidler->addDoors();
        $buidler->addWheels();
        return $buidler->create();
    }
}

$buidler = new CarBuilder(new Car);
var_dump((new Factory)->make($buidler));