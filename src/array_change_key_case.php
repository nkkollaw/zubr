<?php declare(strict_types=1);

namespace Zubr;

/**
 * Changes all keys in an array
 * @link http://php.net/manual/en/function.array-change-key-case.php
 * @param array $input <p>
 * The array to work on
 * </p>
 * @param int $case [optional] <p>
 * Either CASE_UPPER or
 * CASE_LOWER (default)
 * </p>
 * @return array an array with its keys lower or uppercased, or false if
 * input is not an array.
 * @since 4.2.0
 * @since 5.0
 */
function array_change_key_case(array $input, $case = null)
{
    return \array_change_key_case($input, $case);
}
