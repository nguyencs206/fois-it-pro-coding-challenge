<?php

namespace Nguyencs\FITCodingChallenge\Controls;

class NumericInput extends TextInput
{
    public const ACCEPTABLE_CHARACTERS = ['.'];
    public function add(string $value): void
    {
        if (!is_numeric($value) && !in_array($value, self::ACCEPTABLE_CHARACTERS)) {
            return;
        }

        $this->value = $this->value . $value;
    }
}