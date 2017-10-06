<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

final class IntegerParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue(): int
    {
        return random_int(1, PHP_INT_MAX);
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return in_array($parameter->getType()->getName(), ['int', 'integer'], true);
    }
}
