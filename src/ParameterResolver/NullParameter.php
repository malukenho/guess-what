<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

final class NullParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return null === $parameter->getType();
    }
}
