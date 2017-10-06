<?php

declare(strict_types=1);

namespace GuessWhat\ParameterResolver;

use ReflectionParameter;

interface ParameterResolverInterface
{
    public function generateValue();

    public function canResolve(ReflectionParameter $parameter): bool;
}
