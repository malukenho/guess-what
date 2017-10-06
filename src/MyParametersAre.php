<?php

declare(strict_types=1);

namespace GuessWhat;

use ReflectionMethod;
use ReflectionParameter;

class MyParametersAre implements GuesserInterface
{
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
        return array_map(
            function (ReflectionParameter $parameter) {
                foreach (self::TYPE_RESOLVER as $resolver) {
                    // @todo instantiate the list previously
                    // @todo probably a chain...
                    $a = new $resolver;
                    if ($a->canResolve($parameter)) {
                        return $a->generateValue();
                    }
                }
            },
            $this->reflectionMethod->getParameters()
        );
    }
}
