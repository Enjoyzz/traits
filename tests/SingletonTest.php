<?php

declare(strict_types=1);

namespace Tests\Enjoys\Traits;

require_once __DIR__ . '/fixtures/SingletonCase1.php';
require_once __DIR__ . '/fixtures/SingletonCase2.php';
require_once __DIR__ . '/fixtures/SingletonCase3.php';

use Enjoys\Patterns\Singleton;
use PHPUnit\Framework\TestCase;

/**
 * Class SingletonTest
 * @package Tests\Enjoys\Traits
 */
class SingletonTest extends TestCase
{

    public function testSingleton(): void
    {
        $s1 = \SingletonCase1::getInstance();
        $s2 = \SingletonCase1::getInstance();
        $s2->setParam(12);
        $this->assertEquals(12, $s1->getParam());
        $s1->setParam(80);
        $this->assertEquals(80, $s2->getParam());
    }

    public function testSingleton1_2(): void
    {
        $s1 = \SingletonCase2::getInstance();
        $s2 = \SingletonCase2::getInstance();
        $s2->setParam(12);
        $this->assertEquals(12, $s1->getParam());
        $s1->setParam(80);
        $this->assertEquals(80, $s2->getParam());
    }

    public function testSingleton2(): void
    {
        $s2 = \SingletonCase1::getInstance();
        $this->assertEquals(80, $s2->getParam());
        $s2->setParam(100);
    }

    public function testCloseInstance(): void
    {
        $s3 = \SingletonCase1::getInstance();
        $this->assertEquals(100, $s3->getParam());
        \SingletonCase1::closeInstance();
        $s3 = \SingletonCase1::getInstance();
        $s3->setParam([true]);
        $this->assertEquals([true], $s3->getParam());
    }

    public function testClone(): void
    {
        $this->expectException(\Exception::class);
        $s3 = \SingletonCase1::getInstance();
        $clone = clone $s3;
    }

    public function testUnserialize(): void
    {
        $this->expectException(\Exception::class);
        $s3 = \SingletonCase1::getInstance();
        $serialized = serialize($s3);
        unserialize($serialized);
    }

    public function testSingleton3(): void
    {
        $singleton = \SingletonCase3::getInstance();
        $this->assertInstanceOf(Singleton::class, $singleton);
    }
}
