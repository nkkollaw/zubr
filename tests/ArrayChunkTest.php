<?php declare(strict_types=1);

class ArrayChunkTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider wrapperDataProvider
     */
    public function testWrapper($input, $size, $preserve_keys = false)
    {
        $actual = \Zubr\array_chunk($input, $size, $preserve_keys);
        $expected = array_chunk($input, $size, $preserve_keys);

        $this->assertEquals($expected, $actual);
    }

    public function wrapperDataProvider()
    {
        return [
            [[1, 2, 3, 4, 5], 3],
            [[1, 2, 3, 4, 5], 3, true],
            [[1, 2, 3, 4, 5], 1, false],
        ];
    }
}
