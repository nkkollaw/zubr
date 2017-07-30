# \PHP
## Fix inconsistencies in the PHP language (naming, parameter order, passing by reference and more).

PHP is great with Composer, PSR and Laravel, but legacy stuff in the language itself makes it harder to use than it should be (see http://phpsadness.com/).

Let's namespace PHP functions and bring some sanity.

For instance, from:

    parse_url ( string $url [, int $component = -1 ] )
    string urlencode ( string $str )
    
to:


    mixed \PHP\parse_url(string $url[, int $component = -1])
    string \PHP\url_encode(string $str)
    
## Function naming

### Underscores

See: http://phpsadness.com/sad/4

Always use snake_case.

### Prefixes

See: http://phpsadness.com/sad/15

Always use `micro` instead of `u`.

### `to` vs. `2`

See: http://phpsadness.com/sad/48

Always use `to`

## Order of arguments

### Needle/haystack

See: http://phpsadness.com/sad/9 and similar.

Always `$needle, $haystack`: "see if `$needle` is found in `$haystack`" / "find a `$needle` in a `$haystack` vs. "see if in `$haystack` there is `$needle`".

Functions like `method_exists($object, $method_name)` work the same: `\PHP\method_exists($method_name, $object)`, "See if `$method_name` is found in `$object`".

### Callback

See: http://phpsadness.com/sad/6

Always do callback last.

## Contribute

To see how this started see https://news.ycombinator.com/item?id=14885226

Pull requests welcome.

We should probably do 1 function per pull request to make keeping track and discussion easy.





