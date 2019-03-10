<?php 

interface Stat
{
    public function done();
}

class First implements Stat
{
    private $last;
    private $current;

    public function __construct(Stat $last)
    {
        $this->last = $last;
        $this->current = $this;
    }

    public function done()
    {
        if ($this->current == $this) {
            $this->say();
            $this->current = $this->last;
        } else {
            $this->current->done();
        }
    }

    public function say()
    {
        echo 'This is first' . PHP_EOL;
    }
}

class Second implements Stat
{
    public function done()
    {
        echo 'This is second';
    }
}

$context  = new First(new Second);
$context->done();
$context->done();