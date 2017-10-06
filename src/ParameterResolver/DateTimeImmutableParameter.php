<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use DateTimeImmutable;
use ReflectionParameter;

final class DateTimeImmutableParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return DateTimeImmutable::class === $parameter->getClass()->getName();
    }
}
