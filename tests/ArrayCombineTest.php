<?php declare(strict_types=1);

class ArrayCombineTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider wrapperDataProvider
     */
    public function testWrapper(array $keys, array $values)
    {
        $expected = array_combine($keys, $values);
        $actual = \Zubr\array_combine($keys, $values);
        
        $this->assertEquals($expected, $actual);
    }

    public function wrapperDataProvider()
    {
        return [
            [[1,2,3], ['a', 'b', 'c']],
            [['a', 'b', 'c'], [1,2,3]],
        ];
    }
}
