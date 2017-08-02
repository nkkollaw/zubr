<?php declare(strict_types=1);

namespace PHP;

/**
 * Checks if a value exists in an array
 *
 * @param array $haystack
 * @param mixed $needle
 * @param bool $strict
 * @return bool
 * @see \in_array
 */
function in_array(array $haystack, $needle, bool $strict = false): bool
{
    return \in_array($needle, $haystack, $strict);
}
