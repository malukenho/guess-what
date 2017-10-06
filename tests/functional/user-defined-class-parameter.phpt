--TEST--
It should be able to inject the correct int parameter
--FILE--
<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

class Foo {}

class UserDefinedClassParameter
{
    public function foo(Foo $object): Foo
    {
        return $object;
    }
}

$params = (new GuessWhat\MyParametersAre(
    new \ReflectionMethod(UserDefinedClassParameter::class, 'foo'),
    new class implements \GuessWhat\ParameterResolver\ParameterResolverInterface {
        public function generateValue(): Foo {
            return new Foo;
        }

        public function canResolve(ReflectionParameter $parameter): bool {
            return \Foo::class === $parameter->getClass()->getName();
        }
    }))
        ->__invoke();

var_dump($params[0] instanceof Foo);
?>
--EXPECTF--
bool(true)
