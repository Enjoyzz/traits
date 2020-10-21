<?php

/*
 * The MIT License
 *
 * Copyright 2020 deadl.
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

declare(strict_types=1);

namespace Tests\Enjoys\Traits;

require_once __DIR__ . '/fixtures/SingletonCase1.php';

use PHPUnit\Framework\TestCase;

/**
 * Description of SingletonTest
 *
 * @author deadl
 */
class SingletonTest extends TestCase
{

    public function test_singleton()
    {
        $s1 = \SingletonCase1::getInstance();
        $s2 = \SingletonCase1::getInstance();
        $s2->setParam(12);
        $this->assertEquals(12, $s1->getParam());
        $s1->setParam(80);
        $this->assertEquals(80, $s2->getParam());
    }

    public function test_singleton2()
    {
        $s2 = \SingletonCase1::getInstance();
        $this->assertEquals(80, $s2->getParam());
        $s2->setParam(100);
    }

    public function test_closeinstance()
    {
        $s3 = \SingletonCase1::getInstance();
        $this->assertEquals(100, $s3->getParam());
        \SingletonCase1::closeInstance();
        $s3 = \SingletonCase1::getInstance();
        $s3->setParam([true]);
        $this->assertEquals([true], $s3->getParam());
    }

    public function test_clone()
    {
        $this->expectException(\Exception::class);
        $s3 = \SingletonCase1::getInstance();
        $clone = clone $s3;
    }
    
    public function test_unserialize()
    {
        $this->expectException(\Exception::class);
        $s3 = \SingletonCase1::getInstance();
        $serialized = serialize($s3);
        $unserialiezd = unserialize($serialized);
    }
}
