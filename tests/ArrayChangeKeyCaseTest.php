<?php declare(strict_types=1);

class ArrayChangeKeyCaseTest extends PHPUnit\Framework\TestCase
{
    public function testLower()
    {
        $input = ['test1', 'tEsT2', 'TEST3'];
        $actual = PHP\array_change_key_case($input, CASE_LOWER);
        $expected = array_change_key_case($input, CASE_LOWER);

        $this->assertEquals($expected, $actual);
    }

    public function testUpper()
    {
        $input = ['test1', 'tEsT2', 'TEST3'];
        $actual = PHP\array_change_key_case($input, CASE_UPPER);
        $expected = array_change_key_case($input, CASE_UPPER);

        $this->assertEquals($expected, $actual);
    }
}
