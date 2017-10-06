--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class DateTimeParameter
{
    public function foo(\DateTime $dateTime): \DateTime
    {
        return $dateTime;
    }
}

$params = (new GuessWhat\MyParametersAre(new \ReflectionMethod(DateTimeParameter::class, 'foo')))
    ->__invoke();

var_dump(is_int($params[0]));
var_dump(is_string($params[0]));
var_dump(is_bool($params[0]));
var_dump($params[0] instanceof  \DateTime);
?>
--EXPECTF--
bool(false)
bool(false)
bool(false)
bool(true)
