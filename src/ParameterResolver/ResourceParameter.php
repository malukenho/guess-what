<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

final class ResourceParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue()
    {
        return tmpfile();
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return 'resource' === $parameter->getType()->getName();
    }
}
