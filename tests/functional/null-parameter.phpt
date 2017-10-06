--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class NullParameter
{
    public function foo($nullable = null): void
    {
        return;
    }
}

$params = (new GuessWhat\MyParametersAre(new \ReflectionMethod(NullParameter::class, 'foo')))
    ->__invoke();

var_dump($params[0]);
var_dump(is_null($params[0]));
var_dump(null === $params[0]);
?>
--EXPECTF--
NULL
bool(true)
bool(true)
