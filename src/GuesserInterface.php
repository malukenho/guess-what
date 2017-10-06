<?php

declare(strict_types=1);

namespace GuessWhat;

use GuessWhat\ParameterResolver\BoolParameter;
use GuessWhat\ParameterResolver\FloatParameter;
use GuessWhat\ParameterResolver\IntegerParameter;
use GuessWhat\ParameterResolver\ResourceParameter;
use GuessWhat\ParameterResolver\StringParameter;

interface GuesserInterface
{
    public const TYPE_RESOLVER = [
        IntegerParameter::class,
        StringParameter::class,
        BoolParameter::class,
        FloatParameter::class,
        ResourceParameter::class,
    ];
}
