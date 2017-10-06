<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

final class FloatParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue(): float
    {
        return random_int(0, PHP_INT_MAX) / 100;
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return in_array($parameter->getType()->getName(), ['float', 'double'], true);
    }
}
