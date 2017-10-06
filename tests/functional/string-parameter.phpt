--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class StringParameter
{
    public function foo(string $string): string
    {
        return $string;
    }
}

$params = (new GuessWhat\Injector(new \ReflectionMethod(StringParameter::class, 'foo')))
    ->__invoke();

var_dump(is_int($params[0]));
var_dump(is_string($params[0]));
?>
--EXPECTF--
bool(false)
bool(true)
