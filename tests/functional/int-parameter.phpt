--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class IntParameter
{
    public function foo(int $int): int
    {
        return $int;
    }
}

$params = (new GuessWhat\Injector(new \ReflectionMethod(IntParameter::class, 'foo')))
    ->__invoke();

var_dump(is_int($params[0]));
?>
--EXPECTF--
bool(true)
