<?php declare(strict_types=1);

namespace Zubr;

/**
 * (PHP 5 &gt;=5.5.0)<br/>
 * Return the values from a single column in the input array
 * @link http://www.php.net/manual/en/function.array-column.php
 * @param array $array <p>A multi-dimensional array (record set) from which to pull a column of values.</p>
 * @param mixed $column <p>The column of values to return. This value may be the integer key of the column you wish to
 * retrieve, or it may be the string key name for an associative array. It may also be NULL to return complete arrays
 * (useful together with index_key to reindex the array).</p>
 * @param mixed $index_key [optional] <p>The column to use as the index/keys for the returned array. This value may be
 * the integer key of the column, or it may be the string key name.</p>
 * @return array Returns an array of values representing a single column from the input array.
 * @since 5.5.0
 */
function array_column(array $array, $column, $index_key = null): array
{
    return \array_column($array, $column, $index_key);
}
