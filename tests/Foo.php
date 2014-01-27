<?php

namespace Tests;

/**
 * Class Foo
 */
class Foo
{
    use \Prototype\Prototype;

    /**
     * Bar
     *
     * @return string
     */
    public function bar()
    {
        return 'baz';
    }
}
