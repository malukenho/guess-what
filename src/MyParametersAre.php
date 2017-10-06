<?php

declare(strict_types=1);

namespace GuessWhat;

use Doctrine\Instantiator\Instantiator;
use GuessWhat\ParameterResolver\ParameterResolverInterface;
use ReflectionMethod;
use ReflectionParameter;

class MyParametersAre implements GuesserInterface
{
    /**
     * @var ReflectionMethod
     */
    private $reflectionMethod;

    /**
     * @var ParameterResolverInterface[]
     */
    private $resolvers;

    public function __construct(
        ReflectionMethod $reflectionMethod,
        ?ParameterResolverInterface ...$additionalResolvers
    ) {
        $this->reflectionMethod = $reflectionMethod;
        $this->resolvers = array_merge($this->instantiateDefaultResolvers(self::TYPE_RESOLVER), (array) $additionalResolvers);
    }

    private function instantiateDefaultResolvers(array $defaultResolvers)
    {
        $instantiator = new Instantiator();

        return array_map(
            function (string $resolver) use ($instantiator): ParameterResolverInterface {
                return $instantiator->instantiate($resolver);
            },
            $defaultResolvers
        );
    }

    public function __invoke(): array
    {
        return array_map(
            function (ReflectionParameter $parameter) {
                // @todo remote this foreach
                foreach ($this->resolvers as $resolver) {
                    if ($resolver->canResolve($parameter)) {
                        return $resolver->generateValue();
                    }
                }
            },
            $this->reflectionMethod->getParameters()
        );
    }
}
