<?php

use function PHP\html_entities;

class HtmlEntitiesTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider wrapperDataProvider
     */
    public function testWrapper($string, $flags = null, $encoding = null, $doubleEncode = null)
    {
        $arguments = array_filter([$string, $flags, $encoding, $doubleEncode]);
        $actual = html_entities(...$arguments);
        $expected = htmlentities(...$arguments);

        $this->assertEquals($expected, $actual);
    }

    public function wrapperDataProvider()
    {
        $str = "A 'quote' is <b>bold</b>";

        return [
            [$str],
            [$str, ENT_QUOTES],
            [$str, ENT_QUOTES, 'UTF-8'],
            [htmlentities($str), ENT_COMPAT | ENT_HTML401, 'UTF-8', false],
        ];
    }
}
