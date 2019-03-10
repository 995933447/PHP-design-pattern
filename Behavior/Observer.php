<?php 
class User implements SplSubject
{
    private $name;

    private $observers;

    public function __construct(stirng $name)
    {
        $this->name = $name;
        $this->observers = new SplObjectStorage();
    }

    public function setName(string $name)
    {
        $this->name = $name;
        $this->notify();
    }

    public function attach(SplObserver $observer)
    {
        $this->oberservers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observer->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }
}

class Email implements SplObserver
{
    public function update(SplSubject $subject)
    {
        print "Email:user's name became" . $subject->name;
    }
}

class Phone implements SplObserver
{
    public function update(SplSubject $subject)
    {
        print "SMS:user's name became" . $subject->name;
    }
}