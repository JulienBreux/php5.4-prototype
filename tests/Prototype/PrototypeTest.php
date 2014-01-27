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
     * Test: Access property
     */
    public function testAccessProperty()
    {
        Foo::prototypeClean();

        $foo = new Foo;

        $foo->hello = 'world';

        $this->assertEquals($foo->hello, 'world');
        $this->assertNull($foo->bye);
    }

    /**
     * Test: Add method to class
     */
    public function testAddMethodToClass()
    {
        Foo::prototypeClean();

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

        $this->assertNull($fooClass->anotherSaidHello());
    }

    /**
     * Test: Check method in class
     */
    public function testCheckMethodInClass()
    {
        Foo::prototypeClean();

        // Add method
        Foo::prototype('saidHello', function($name)
        {
            return "Hello $name";
        });

        $this->assertTrue(Foo::prototypeExists('saidHello'));
    }

    /**
     * Test: Check method in object
     */
    public function testCheckMethodInObject()
    {
        Foo::prototypeClean();

        $fooClass = new Foo();

        // Add method
        $fooClass->saidHello = function($name)
        {
            return "Hello $name";
        };

        $this->assertTrue(Foo::prototypeExists('saidHello'));

        Foo::prototypeClean();

        $this->assertFalse(Foo::prototypeExists('notSaidHello'));
    }

    /**
     * Test: Add method to object
     */
    public function testAddMethodToObject()
    {
        Foo::prototypeClean();

        $fooClass = new Foo();

        // Add method
        $fooClass->saidHello = function($name)
        {
            return "Hello $name";
        };

        $this->assertEquals(
            $fooClass->saidHello('world'),
            'Hello world'
        );
    }
}
