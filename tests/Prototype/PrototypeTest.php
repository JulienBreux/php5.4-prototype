<?php

namespace Tests\Prototype;

require __DIR__.'/../Foo.php';

use Tests\Foo;

/**
 * Class ContainerTest
 *
 * @package Prototype\Tests
 */
class PrototypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test: Add method to object
     */
    public function testAddMethodToObject()
    {
        $fooClass = new Foo();

        // Add method
        $fooClass->{'saidHello'} = function($name)
        {
            return "Hello $name";
        };

        $this->assertEquals(
            $fooClass->saidHello('world'),
            'Hello world'
        );
    }

    /**
     * Test: Add method to class
     */
    public function testAddMethodToClass()
    {
        // Add method
        Foo::prototype('saidHello', function($name)
        {
            return "Hello $name";
        });

        $fooClass = new Foo;

        $this->assertEquals(
            $fooClass->saidHello('planet'),
            'Hello planet'
        );
    }

    /**
     * Test: Check method in object
     */
    public function testCheckMethodInObject()
    {
        $fooClass = new Foo();

        // Add method
        $fooClass->{'saidHello'} = function($name)
        {
            return "Hello $name";
        };

        $this->assertTrue(Foo::prototypeExists('saidHello'));
    }

    /**
     * Test: Check method in class
     */
    public function testCheckMethodInClass()
    {
        // Add method
        Foo::prototype('saidHello', function($name)
        {
            return "Hello $name";
        });

        $this->assertTrue(Foo::prototypeExists('saidHello'));
    }
}
