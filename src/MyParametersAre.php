<?php

declare(strict_types=1);

namespace GuessWhat;

use ReflectionMethod;

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
        $list = [];
        $params = $this->reflectionMethod->getParameters();

        foreach ($params as $param) {
            foreach (self::TYPE_RESOLVER as $resolver) {
                // @todo instantiate the list previously
                // @todo probably a chain...
                $a = new $resolver;
                if ($a->canResolve($param)) {
                    $list[] = $a->generateValue();
                }
            }
        }

        return $list;
    }
}
