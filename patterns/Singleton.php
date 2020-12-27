<?php

declare(strict_types=1);

namespace Enjoys\Patterns;

/**
 * Class Singleton
 * @package Enjoys\Patterns
 */
class Singleton
{

    /**
     * @var Singleton|null
     */
    protected static  ?Singleton $instance;

    final private function __construct()
    {

    }

    /**
     * @throws \Exception
     */
    final public function __unserialize(): void
    {
        throw new \Exception('You can not deserialize a singleton.');
    }

    /**
     * @throws \Exception
     */
    final public function __clone()
    {
        throw new \Exception('You can not clone a singleton.');
    }


    /**
     * @return Singleton
     */
    final public static function getInstance(): Singleton
    {
        return static::$instance ??= new static();
    }

    public static function closeInstance(): void
    {
        static::$instance = null;
    }
}
