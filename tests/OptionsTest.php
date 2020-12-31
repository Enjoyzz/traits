<?php

declare(strict_types=1);

namespace Tests\Enjoys\Traits;

use Enjoys\Traits\Options;
use PHPUnit\Framework\TestCase;

/**
 * Class OptionsTest
 * @package Tests\Enjoys\Traits
 */
class OptionsTest extends TestCase
{

    use Options;

    private string $foo = '';

    public function test_setOption_getOption()
    {
        $mock = $this->getMockForTrait('Enjoys\Traits\Options');
        $mock->setOption('test', 'value');
        $this->assertEquals('value', $mock->getOption('test'));
        $this->assertEquals(null, $mock->getOption('notisset'));
        $this->assertEquals(true, $mock->getOption('notisset', true));
    }

    public function test_setOptions_getOptions()
    {
        $mock = $this->getMockForTrait('Enjoys\Traits\Options');
        $mock->setOptions(
            [
                'foo' => 'bar'
            ]
        );
        $this->assertEquals('bar', $mock->getOption('foo'));
        $this->assertEquals(['foo' => 'bar'], $mock->getOptions());
    }

    public function testSetUseInternalMethods()
    {
        $this->setOptions(
            [
                'foo' => 'bar'
            ]
        );
        $this->assertSame('something_bar', $this->getOption('foo'));

        $this->setOptions(
            [
                'foo' => 'bar'
            ],
            false
        );
        $this->assertSame('something_bar', $this->getOption('foo'));
        $this->assertSame('bar', $this->getOption('foo', null, false));
    }

    /**
     * @param mixed $value
     */
    private function setFoo($value = '')
    {
        $this->foo = 'something_' . $value;
    }

    private function getFoo(): string
    {
        return $this->foo;
    }
}
