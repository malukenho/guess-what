<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

// @todo implements it
final class NullParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue(): bool
    {
        return random_int(0, 1) === 0;
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return in_array($parameter->getType()->getName(), ['bool', 'boolean'], true);
    }
}
