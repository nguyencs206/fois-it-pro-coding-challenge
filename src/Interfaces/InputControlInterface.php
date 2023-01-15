<?php

namespace Nguyencs\FITCodingChallenge\Interfaces;

interface InputControlInterface
{
    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param string $value
     */
    public function add(string $value): void;
}