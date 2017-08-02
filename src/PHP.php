<?php
namespace PHP;

function str_i_str($haystack, $needle, $before_needle = false) {
    return stristr($haystack, $needle, $before_needle);
}

function str_str($haystack, $needle, $before_needle = false) {
    return strstr($haystack, $needle, $before_needle);
}

function str_i_pos($haystack, $needle, $offset = 0) {
    return stripos($haystack, $needle, $offset);
}

function str_pos($haystack, $needle, $offset = 0) {
    return strpos($haystack, $needle, $offset);
}

function url_encode($str) {
    return urlencode($str);
}
