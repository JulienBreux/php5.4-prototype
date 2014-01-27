# PHP 5.4 - Prototype

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/JulienBreux/php5.4-prototype/badges/quality-score.png?s=5efbaf564aed304612f118b4811d581453a9a227)](https://scrutinizer-ci.com/g/JulienBreux/php5.4-prototype/)
[![Code Coverage](https://scrutinizer-ci.com/g/JulienBreux/php5.4-prototype/badges/coverage.png?s=1225f6ce9657cb83e367299b019e7dc9f4cc4dbf)](https://scrutinizer-ci.com/g/JulienBreux/php5.4-prototype/)

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
