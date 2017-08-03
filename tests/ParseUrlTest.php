<?php

class ParseUrlTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider wrapperDataProvider
     */
    public function testWrapper($url, $component = null)
    {
        $arguments = array_filter([$url, $component]);
        $actual = \Zubr\parse_url(...$arguments);
        $expected = \parse_url(...$arguments);

        $this->assertEquals($expected, $actual);
    }

    public function wrapperDataProvider()
    {
        $url = 'http://username:password@hostname:9090/path?arg=value#anchor';

        return [
            [$url],
            [$url, PHP_URL_QUERY],
        ];
    }
}
