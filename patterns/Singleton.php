<?php

declare(strict_types=1);

namespace Enjoys\Patterns;

/**
 * Class Singleton
 * @package Enjoys\Patterns
 */
class Singleton
{

    protected static $instance;

    final private function __construct()
    {

    }

    final public function __unserialize(array $data)
    {
        throw new \Exception('You can not deserialize a singleton.');
    }

    final public function __clone()
    {
        throw new \Exception('You can not clone a singleton.');
    }


    /**
     * @return static
     */
    final public static function getInstance()
    {
        return static::$instance ??= new static();
    }

    public static function closeInstance(): void
    {
        static::$instance = null;
    }
}
