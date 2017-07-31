<?php
namespace PHP;

/**
 * From http://php.net/manual/en/function.htmlentities.php: "html_entity_decode() is the opposite of htmlentities() in that it converts all HTML entities in the string to their applicable characters.".
 * Let's create a html_entity_encode alias to make the thing intuitive
 * 
 * @alias htmlentities()
 */
function html_entity_encode($string, $flags=ENT_COMPAT | ENT_HTML401, $encoding=ini_get("default_charset"), $double_encode=true) {
    return htmlentities($string, $flags, $encoding, $double_encode);
}

function class_exists($class_name, $autoload = false) {
    return class_exists($class_name, $autoload);
}

function extension_loaded($name) {
    return extension_loaded($name);
}

function function_exists($function_name) {
    return function_exists($function_name);
}

function get_defined_functions($exclude_disabled = false) {
    return get_defined_functions($exclude_disabled);
}

function method_exists($method_name, $object) {
    return method_exists($object, $method_name);
}

function parse_url($url, $component=-1) {
    return parse_url($url, $component);
}

function str_i_str($needle, $haystack, $before_needle = false) {
    return stristr($haystack, $needle, $before_needle);
}

function str_str($needle, $haystack, $before_needle = false) {
    return strstr($haystack, $needle, $before_needle);
}

function str_i_pos($needle, $haystack, $offset = 0) {
    return stripos($haystack, $needle, $offset);
}

function str_pos($needle, $haystack, $offset = 0) {
    return strpos($haystack, $needle, $offset);
}

function url_encode($str) {
    return urlencode($str);
}
