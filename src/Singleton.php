<?php

/*
 * The MIT License
 *
 * Copyright 2020 Enjoys.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Enjoys\Traits;

/**
 * Singleton
 * 
 * @author Enjoys
 */
trait Singleton
{

    /**
     * @var self
     */
    protected static $instance;

    /**
     * Disabled __construct
     */
    private function __construct()
    {
        static::setInstance($this);
    }

    /**
     * 
     * @param static $instance
     * @return object
     * @throws \Exception
     */
    final static public function setInstance($instance)
    {
        if ($instance instanceof static) {
            static::$instance = $instance;
        } else {
            throw new \Exception(sprintf('First parameter for method `%s` should be instance of `%s`', __METHOD__, __CLASS__));
        }
        return static::$instance;
    }

    /**
     * Получает экземпляр класса, если его нет - создает
     * @return object
     */
    final static public function getInstance()
    {
        return static::$instance ?? new static;
    }

    /**
     * Закрывает существующий экземпляр класса
     *
     * @return void
     */
    public static function closeInstance(): void
    {
        static::$instance = null;
        return;
    }

    final public function __wakeup()
    {
        throw new \Exception('You can not deserialize a singleton.');
    }

    final public function __clone()
    {
        throw new \Exception('You can not clone a singleton.');
    }
}
