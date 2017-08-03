<?php declare(strict_types=1);

namespace PHP;

/**
 * Split an array into chunks
 * @link http://php.net/manual/en/function.array-chunk.php
 * @param array $input <p>
 * The array to work on
 * </p>
 * @param int $size <p>
 * The size of each chunk
 * </p>
 * @param bool $preserve_keys [optional] <p>
 * When set to true keys will be preserved.
 * Default is false which will reindex the chunk numerically
 * </p>
 * @return array a multidimensional numerically indexed array, starting with zero,
 * with each dimension containing size elements.
 * @since 4.2.0
 * @since 5.0
 */
function array_chunk(array $input, int $size, bool $preserve_keys = false)
{
    return \array_chunk($input, $size, $preserve_keys);
}
