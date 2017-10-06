--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class FloatParameter
{
    public function foo(float $string): float
    {
        return $float;
    }
}

$params = (new GuessWhat\MyParametersAre(new \ReflectionMethod(FloatParameter::class, 'foo')))
    ->__invoke();

var_dump(is_int($params[0]));
var_dump(is_string($params[0]));
var_dump(is_float($params[0]));
?>
--EXPECTF--
bool(false)
bool(false)
bool(true)
