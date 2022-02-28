<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function empty_string_returns_0()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add("");

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function string_1_returns_1()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add("1");

        $this->assertEquals("1", $result);
    }



}
