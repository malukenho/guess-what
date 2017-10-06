<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

final class StringParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue(): string
    {
        return uniqid('guess-what', true);
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return 'string' === $parameter->getType()->getName();
    }
}
