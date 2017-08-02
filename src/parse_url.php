<?php declare(strict_types=1);

namespace PHP;

/**
 * Parse a URL and return its components
 *
 * @param string $url
 * @param int $component
 * @return mixed
 * @see \parse_url
 */
function parse_url(string $url, int $component = -1)
{
    return \parse_url($url, $component);
}
