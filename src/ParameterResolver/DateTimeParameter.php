<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use DateTime;
use ReflectionParameter;

final class DateTimeParameter implements ParameterResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateValue(): DateTime
    {
        return new DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function canResolve(ReflectionParameter $parameter): bool
    {
        return DateTime::class === $parameter->getClass()->getName();
    }
}
