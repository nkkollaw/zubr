# \PHP
## Fix inconsistencies in the PHP language (naming, parameter order, passing by reference and more).

PHP is great with Composer and PSR, but legacy stuff in the language itself makes it harder to use than it should be (see http://phpsadness.com/).

Let's namespace PHP functions and bring some sanity.

For instance, from:

    parse_url ( string $url [, int $component = -1 ] )
    string urlencode ( string $str )
    
to:


    mixed \PHP\parse_url(string $url[, int $component = -1])
    string \PHP\url_encode(string $str)
    
# Guidelines

## 0. Introduction

PHP >= 7.0
    
## 1. Function naming

### 1.1 Underscores

See: http://phpsadness.com/sad/4

Always use snake_case.

### 1.2 Prefixes

See: http://phpsadness.com/sad/15

Always use `micro` instead of `u` (add aliases)

### 1.3 `to` vs. `2`

See: http://phpsadness.com/sad/48

Always use `to` (add aliases)

## 2. Order of arguments

### 2.1 Needle/haystack

See: http://phpsadness.com/sad/9 and similar.

Always 'subject', then 'keyword' (for example you'd say "search Google (`%SUBJECT%`) for `%KEYWORD%`"). That is, `$haystack` first, then `$needle`. Most PHP functions already follow this convention.

### 2.2 Callbacks

See: http://phpsadness.com/sad/6

Always do callback last.

## 3. Argument type

> Note: If the parameters given to a function are not what it expects, such as passing an array where a string is expected, the return value of the function is undefined. In this case it will likely return NULL but this is just a convention, and cannot be relied upon. http://php.net/manual/en/functions.internal.php

Fix the above.

## Contribute

To see how this started see https://news.ycombinator.com/item?id=14885226

Pull requests welcome.

We should probably do 1 function per pull request to make keeping track and discussion easy.

A list of functions can be retrieved using `get_defined_functions`.
