<?php
class Singleton
{
    private static $instance;

    public function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {

    }
}