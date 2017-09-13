<?php
declare(strict_types=1);

namespace Zubr;

/**
 * \Zubr\array_key_exists()
 *
 * @link https://secure.php.net/array_key_exists
 *
 * NOTES: in Zubr, the $array parameter comes before $key
*/
function array_key_exists($array, $key)
{
    return \array_key_exists($key, $array);
}
