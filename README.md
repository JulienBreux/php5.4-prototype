# PHP 5.4 - Prototype

Play with prototype in PHP 5.4!

## Example:

### Class:
``` php
class Foo
{
	use Prototype;
}
```

### Code:
``` php
$foo = new Foo;

$foo->saidHello = function($lastName)
{
	return "Hello $lastName";
};

echo $foo->saidHello('Julien');
```