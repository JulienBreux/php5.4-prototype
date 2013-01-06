# PHP 5.4 - Prototype

Play with prototype in PHP 5.4!

## Example

### Class
``` php
class Foo
{
	use Prototype\Prototype;
}
```

### Add prototype to object (and others objects)
``` php
$foo = new Foo;

$foo->saidHello = function($lastName)
{
	return "Hello $lastName";
};

echo $foo->saidHello('Julien');
```

### Add prototype to class (for all objects)
```php
Foo::prototype('saidHello', function($lastName)
{
  return "Hello $lastName";
});
```

### Usage
```php
$bar = new Foo;

echo $bar->saidHello('Laura');
```
