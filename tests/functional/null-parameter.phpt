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
        var_dump($nullable);
    }
}

(new GuessWhat\MyParametersAre(new \ReflectionMethod(NullParameter::class, 'foo')))
    ->__invoke();

?>
--EXPECTF--
bool(false)
bool(false)
bool(false)
bool(true)
