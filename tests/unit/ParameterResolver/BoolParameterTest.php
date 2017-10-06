<?php

declare(strict_types=1);

namespace GuessWhatTest\unit;

use GuessWhat\ParameterResolver\BoolParameter;

final class BoolParameterTest extends AbstractParameterTest
{
    protected function setUp(): void
    {
        $this->sut = new BoolParameter();
    }

    public function providerValidParameter(): array
    {
        return [
            [$this->registerClassWithBooleanParameter()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function providerInvalidParameters(): array
    {
        return [
            [$this->registerClassWithIntegerParameter()],
            [$this->registerClassWithStringParameter()],
            [$this->registerClassWithDateTimeParameter()],
            [$this->registerClassWithDateTimeImmutableParameter()],
        ];
    }
}
