<?php

abstract class Atrribute
{
    abstract public function setValue($value);

    abstract public function __toString();
} 

class Color extends Atrribute
{
    protected $values;

    public function setValue($value)
    {
        $this->values[] = $value;
    }

    public function __toString()
    {
        echo 'color:' . implode(',', $this->values) . ';';
    }
}

class Memory extends Atrribute
{
    protected $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        echo 'memory:' . $this->value . ';';
    }
}



interface Item
{
    public function setAttribute();

    public function display();
}

class Phone implements Item 
{
    private $attributes = [];

    public function setAttribute(Attribute $attribute)
    {
        $this->attributes[] = $attribute;
    }

    public function display()
    {
        $output = '';
        foreach($this->attributes as $atrribute)
        {
            $output .= $attribute;
        }
        return output;
    }
}