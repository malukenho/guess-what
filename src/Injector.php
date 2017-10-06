<?php

declare(strict_types=1);

namespace GuessWhat;

use GuessWhat\ParameterResolver\BoolParameter;
use GuessWhat\ParameterResolver\FloatParameter;
use GuessWhat\ParameterResolver\IntegerParameter;
use GuessWhat\ParameterResolver\StringParameter;
use ReflectionMethod;

class Injector implements InjectorInterface
{
    // @todo move it to the interface?
    private const TYPE_RESOLVER = [
        IntegerParameter::class,
        StringParameter::class,
        BoolParameter::class,
        FloatParameter::class,
    ];

    /**
     * @var ReflectionMethod
     */
    private $reflectionMethod;

    public function __construct(ReflectionMethod $reflectionMethod)
    {
        $this->reflectionMethod = $reflectionMethod;
    }

    public function __invoke(): array
    {
        $list = [];
        $params = $this->reflectionMethod->getParameters();

        foreach ($params as $param) {
            foreach (self::TYPE_RESOLVER as $resolver) {
                $a = new $resolver;
                if ($a->canResolve($param)) {
                    $list[] = $a->generateValue();
                }
            }
        }

        return $list;
    }
}
