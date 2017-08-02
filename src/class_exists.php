<?php declare(strict_types=1);

namespace PHP;

/**
 * Checks if the class has been defined
 *
 * @param string $className
 * @param bool $autoload
 * @return bool
 * @see \class_exists
 */
function class_exists(string $className, bool $autoload = true): bool
{
    return \class_exists($className, $autoload);
}
