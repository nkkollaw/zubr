# Zubr

## Wrapper library to fix inconsistencies in PHP's core functions.

PHP is great and Composer, PHP-FIG, and all the different frameworks make it even greater. However, there is still legacy stuff in the language itself that makes PHP harder to use than it should be (see http://phpsadness.com/ for one of many lists).

Zubr wraps PHP's built-in functions and attempts to fix a few things—starting with consistent naming, order of arguments, and more.

For instance, from:

    parse_url()
    urlencode()
    
to:

    \Zubr\parse_url()
    \Zubr\url_encode()
    
and even:

    htmlentities()
    html_entity_decode()
    
to:

    \Zubr\html_entity_encode() // alias to htmlentities(), \Zubr\html_entities()
    \Zubr\html_entity_decode()
    
Functions always have the same name as the build-in ones, but they follow the same set of rules. Zubr is intuitive to use, because function names are predictable and similar to the ones you're used to. 

Zubr's idea came from commenting this HN post: https://news.ycombinator.com/item?id=14883784
    
# Rules

## 0. Introduction

We're ignoring PHP < 7.0.0. Any function that is deprecated and not included in PHP 7.0.0 won't be found in Zubr.
    
## 1. Function naming

### 1.1 Underscores

See: http://phpsadness.com/sad/4

We always use snake_case.

### 1.2 Prefixes

See: http://phpsadness.com/sad/15

We add aliases using `micro` instead of `u` (which sometimes means `user`).

We add aliases using `user` instead of `u` (which sometimes means `micro`).

### 1.3 `to` vs. `2`

See: http://phpsadness.com/sad/48

We add aliases using `to` instead of `2`.

## 2. Order of arguments

### 2.1 Needle/haystack

See: http://phpsadness.com/sad/9 and similar.

We always put the subject first, then the keyword (`$haystack` first, then `$needle`).

For example, you'd say "search *Google* for *dog*" (which means "search `$subject` for `$keyword`").

Most PHP functions already follow this convention.

### 2.2 Callbacks

See: http://phpsadness.com/sad/6

We always put the callback last.

## 3. Argument type

> Note: If the parameters given to a function are not what it expects, such as passing an array where a string is expected, the return value of the function is undefined. In this case it will likely return NULL but this is just a convention, and cannot be relied upon. http://php.net/manual/en/functions.internal.php

We'd like to fix the above in > 1.0 releases.

# Roadmap

Version 1.0 will contain all of PHP's [core built-in functions](http://php.net/manual/en/extensions.membership.php#extensions.membership.core).

We might then go on to implement a private plugin system to add [bundled extensions](http://php.net/manual/en/extensions.membership.php#extensions.membership.bundled) in 2.0, and make the plugin system public so that anyone can implement wrappers to [external extensions](http://php.net/manual/en/extensions.membership.php#extensions.membership.external) in version 3.0.

We have detailed milestones with all features that will be implemented up to version 1.0 at https://github.com/nkkollaw/zubr/milestones.

# Contribute

Pull requests are welcome.

Take a look at the CONTRIBUTE file. 
    
## Contact us

Emails can be found in the `composer.json` file.



