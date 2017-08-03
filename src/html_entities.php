<?php declare(strict_types=1);

namespace Zubr;

/**
 * Convert all applicable characters to HTML entities
 *
 * @see \htmlentities
 * @param string $string
 * @param int $flags
 * @param string $encoding
 * @param bool $doubleEncode
 * @return string
 */
function html_entities(
    string $string,
    int $flags = ENT_COMPAT | ENT_HTML401,
    string $encoding = null,
    bool $doubleEncode = true
): string {
    $encoding = $encoding ?? ini_get('default_charset');
    return \htmlentities($string, $flags, $encoding, $doubleEncode);
}
