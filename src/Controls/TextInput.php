<?php

namespace Nguyencs\FITCodingChallenge\Controls;

use Nguyencs\FITCodingChallenge\Interfaces\InputControlInterface;

class TextInput implements InputControlInterface
{
    protected string $value;

    public function __construct(string $value = '')
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function add(string $value): void
    {
        $this->value = $this->value . $value;
    }
}