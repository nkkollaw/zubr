# \PHP
## Namespaced PHP functions to fix inconsistencies in the PHP language (naming, parameter order, passing by reference).

Sane.

From:

    parse_url ( string $url [, int $component = -1 ] )
    string urlencode ( string $str )
    
to:


    mixed \PHP\parse_url(string $url[, int $component = -1])
    string \PHP\url_encode(string $str)
    
Pull requests welcome. :-)

