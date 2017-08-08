<?php
declare(strict_types=1);
namespace Zubr;

function array_change_key_case(array $input, $case = null)
{
    return \array_change_key_case($input, $case);
}
function array_chunk(array $input, int $size, bool $preserve_keys = false)
{
    return \array_chunk($input, $size, $preserve_keys);
}
function array_column(array $array, $column, $index_key = null): array
{
    return \array_column($array, $column, $index_key);
}
function array_combine(array $keys, array $values)
{
    return \array_combine($keys, $values);
}
function class_exists(string $className, bool $autoload = true): bool
{
    return \class_exists($className, $autoload);
}
function html_entities(
    string $string,
    int $flags = ENT_COMPAT | ENT_HTML401,
    string $encoding = null,
    bool $doubleEncode = true
): string {
    $encoding = $encoding ?? ini_get('default_charset');
    return \htmlentities($string, $flags, $encoding, $doubleEncode);
}
function in_array(array $haystack, $needle, bool $strict = false): bool
{
    return \in_array($needle, $haystack, $strict);
}
function parse_url(string $url, int $component = -1)
{
    return \parse_url($url, $component);
}
?>