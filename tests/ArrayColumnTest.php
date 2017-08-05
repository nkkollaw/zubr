<?php declare(strict_types=1);

class ArrayColumnTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider wrapperDataProvider
     */
    public function testWrapper($array, $column, $index_key = null)
    {
        $expected = array_column($array, $column, $index_key);
        $actual = Zubr\array_column($array, $column, $index_key);

        $this->assertEquals($expected, $actual);
    }

    public function wrapperDataProvider()
    {
        $records = [
            [
                'id' => 2135,
                'first_name' => 'John',
                'last_name' => 'Doe',
            ],
            [
                'id' => 3245,
                'first_name' => 'Sally',
                'last_name' => 'Smith',
            ],
            [
                'id' => 5342,
                'first_name' => 'Jane',
                'last_name' => 'Jones',
            ],
            [
                'id' => 5623,
                'first_name' => 'Peter',
                'last_name' => 'Doe',
            ]
        ];

        return [
            [$records, 'first_name'],
            [$records, 'last_name', 'id']
        ];
    }
}
