<?php  
class Multipart
{
    private static $instances;

    public static function instance(string $name)
    {
        if (!isset(static::$instances[$name])) {
            static::$instances[$name] = new self();
        }

        return static::$instances[$name];
    }

    public function __construct()
    {

    }
}