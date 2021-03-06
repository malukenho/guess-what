<?php

declare(strict_types=1);

namespace GuessWhat;

use GuessWhat\ParameterResolver\BoolParameter;
use GuessWhat\ParameterResolver\DateTimeImmutableParameter;
use GuessWhat\ParameterResolver\DateTimeParameter;
use GuessWhat\ParameterResolver\FloatParameter;
use GuessWhat\ParameterResolver\IntegerParameter;
use GuessWhat\ParameterResolver\NullParameter;
use GuessWhat\ParameterResolver\ResourceParameter;
use GuessWhat\ParameterResolver\StringParameter;

interface GuesserInterface
{
    public const TYPE_RESOLVER = [
        NullParameter::class,
        IntegerParameter::class,
        StringParameter::class,
        BoolParameter::class,
        FloatParameter::class,
        ResourceParameter::class,
        DateTimeParameter::class,
        DateTimeImmutableParameter::class,
    ];
}
