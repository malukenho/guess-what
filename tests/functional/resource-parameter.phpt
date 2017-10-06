--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class ResourceParameter
{
    public function foo(resource $resource): resource
    {
        return $resource;
    }
}

$params = (new GuessWhat\MyParametersAre(new \ReflectionMethod(ResourceParameter::class, 'foo')))
    ->__invoke();

var_dump(is_int($params[0]));
var_dump(is_string($params[0]));
var_dump(is_float($params[0]));
var_dump(is_resource($params[0]));
?>
--EXPECTF--
bool(false)
bool(false)
bool(false)
bool(true)
