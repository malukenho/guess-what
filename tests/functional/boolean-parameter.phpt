--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class BooleanParameter
{
    public function foo(boolean $boolean): boolean
    {
        return $boolean;
    }
}

$params = (new GuessWhat\Injector(new \ReflectionMethod(BooleanParameter::class, 'foo')))
    ->__invoke();

var_dump(is_int($params[0]));
var_dump(is_string($params[0]));
var_dump(is_bool($params[0]));
?>
--EXPECTF--
bool(false)
bool(false)
bool(true)
