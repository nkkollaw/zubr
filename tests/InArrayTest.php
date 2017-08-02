<?php

class InArrayTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider wrapperDataProvider
     */
    public function testWrapper($needle, $haystack, $strict = null)
    {
        $actual = PHP\in_array(...array_filter([$haystack, $needle, $strict]));
        $expected = \in_array(...array_filter([$needle, $haystack, $strict]));

        $this->assertEquals($expected, $actual);
    }

    public function wrapperDataProvider()
    {
        $haystack = ['1.10', 12.4, 1.13];

        return [
            [1.10, $haystack],
            [1.10, $haystack, true],
        ];
    }
}
