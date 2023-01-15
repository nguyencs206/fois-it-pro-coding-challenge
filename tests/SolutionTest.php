<?php

namespace Nguyencs\FITCodingChallenge\Tests;

use Nguyencs\FITCodingChallenge\Controls\NumericInput;
use Nguyencs\FITCodingChallenge\Controls\TextInput;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testProblem1FirstCase(): void
    {
        $inputData = ["Input.txt" => "Randy", "Code.py" => "Stan", "Output.txt" => "Randy"];
        $outputData = groupByOwners($inputData);

        $this->assertCount(2, $outputData);
        $this->assertArrayHasKey('Randy', $outputData);
        $this->assertArrayHasKey('Stan', $outputData);
        $this->assertIsArray($outputData['Randy']);
        $this->assertIsArray($outputData['Stan']);
        $this->assertCount(2, $outputData['Randy']);
        $this->assertCount(1, $outputData['Stan']);
    }

    public function testProblem1SecondCase(): void
    {
        $inputData = ["Input.txt" => "Randy", "Code.py" => 123, 456 => "Randy", "Code1.py" => 123];
        $outputData = groupByOwners($inputData);

        $this->assertCount(1, $outputData);
        $this->assertArrayHasKey('Randy', $outputData);
        $this->assertIsArray($outputData['Randy']);
        $this->assertCount(1, $outputData['Randy']);
    }

    public function testProblem2FirstCase(): void
    {
        $inputData1 = ["User A", "User B", "User C"];
        $inputData2 = ["User D", "User E", "User F"];
        $outputData = unique_names($inputData1, $inputData2);

        $this->assertCount(6, $outputData);
    }

    public function testProblem2SecondCase(): void
    {
        $inputData1 = ["User A", "User B", "User C"];
        $inputData2 = ["User D", "User B", "User A"];
        $outputData = unique_names($inputData1, $inputData2);

        $this->assertCount(4, $outputData);
    }

    public function testProblem2ThirdCase(): void
    {
        $inputData1 = [];
        $inputData2 = ["User D", "User B", "User A"];
        $outputData = unique_names($inputData1, $inputData2);

        $this->assertCount(3, $outputData);
    }

    public function testProblem2FourthCase(): void
    {
        $inputData1 = ["User A", "User B", "User C"];
        $inputData2 = ["User C", "User A", "User B"];
        $outputData = unique_names($inputData1, $inputData2);

        $this->assertCount(3, $outputData);
    }

    public function testTextInput(): void
    {
        $expectedString = 'aBCdeF';
        $input = new TextInput();
        $input->add('a');
        $input->add('BC');
        $input->add('deF');

        $this->assertSame($expectedString, $input->getValue());
    }

    /**
     * Default case
     */
    public function testNumericInputFirstCase(): void
    {
        $expectedString = '10';
        $input = new NumericInput();
        $input->add('1');
        $input->add('a');
        $input->add('0');

        $this->assertSame($expectedString, $input->getValue());
    }

    /**
     * Edge case:
     * The numeric should accept the '.' character when user want to input a floating point
     */
    public function testNumericInputSecondCase(): void
    {
        $expectedString = '1.0';
        $input = new NumericInput();
        $input->add('1');
        $input->add('.');
        $input->add('0');

        $this->assertSame($expectedString, $input->getValue());
    }
}