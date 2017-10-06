<?php

declare(strict_types=1);

namespace GuessWhatTest\unit;

use DateTime;
use DateTimeImmutable;
use GuessWhat\ParameterResolver\ParameterResolverInterface;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionParameter;

abstract class AbstractParameterTest extends TestCase
{
    /**
     * @var ParameterResolverInterface
     */
    protected $sut;

    /**
     * @test
     * @dataProvider providerValidParameter
     */
    final public function it_should_handle_correct_parameters($validParameter): void
    {
        self::assertTrue($this->sut->canResolve($this->extractReflectMethod($validParameter)));
    }

    /**
     * @test
     * @dataProvider providerInvalidParameters
     */
    final public function it_should_not_handle_incorrect_parameters($validParameter): void
    {
        self::assertFalse($this->sut->canResolve($this->extractReflectMethod($validParameter)));
    }

    abstract public function providerValidParameter(): array;

    abstract public function providerInvalidParameters(): array;

    /**
     * @return ReflectionParameter
     */
    final protected function extractReflectMethod($object): ReflectionParameter
    {
        return (new ReflectionMethod($object,'foo' ))->getParameters()[0];
    }

    final protected function registerClassWithIntegerParameter()
    {
        return new class {
            public function foo(int $integer): int {
                return $integer;
            }
        };
    }

    final protected function registerClassWithBooleanParameter()
    {
        return new class {
            public function foo(bool $boolean): bool {
                return $boolean;
            }
        };
    }

    final protected function registerClassWithStringParameter()
    {
        return new class {
            public function foo(string $string): string {
                return $string;
            }
        };
    }

    final protected function registerClassWithDateTimeParameter()
    {
        return new class {
            public function foo(DateTime $dateTime): DateTime {
                return $dateTime;
            }
        };
    }

    final protected function registerClassWithDateTimeImmutableParameter()
    {
        return new class {
            public function foo(DateTimeImmutable $dateTime): DateTimeImmutable {
                return $dateTime;
            }
        };
    }
}
