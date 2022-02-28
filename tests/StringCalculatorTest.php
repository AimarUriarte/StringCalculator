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
    public function given_unknown_number_of_arguments_and_different_separators_return_addition()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add("1.1,2.2,1.1\n2.2");

        $this->assertEquals("6.6", $result);
    }

    /**
     * @test
     */
    public function consecutive_separators_return_error()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add("1.1,\n2.2,1.1,2.2");

        $this->assertEquals("Number expected but \n found at position 4", $result);
    }

    /**
     * @test
     */
    public function last_element_is_separator_return_error()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add("1.1,2.2,1.1,2.2,");

        $this->assertEquals("Number expected but EOF found", $result);
    }

    /**
     * @test
     */
    public function should_handle_custom_delimiters()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add("//|\n1|2");

        $this->assertEquals("3", $result);
    }



}
