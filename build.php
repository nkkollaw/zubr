<?php
/**
 * Returns the line number at which the first function declaration is found
 * @param string $file Full path to the file we're working with
 * @return mixed Line number or false
 */
function first_function_at($file)
{
    $src_code = file_get_contents($file);
    $tokens = token_get_all($src_code, TOKEN_PARSE);

    foreach ($tokens as $token) {
        if (!is_array($token)) {
            continue;
        }

        if ($token[0] == T_FUNCTION) {
            return $token[2];
        }
    }

    return false;
}

try {
    // concatenate files
    if (!is_writable(__DIR__)) {
        throw new Exception('repo dir should be writable by build script');
    }

    if (!is_dir('dist/')) {
        mkdir('dist/');
    }

    $concat_code = '';
    $files = glob('src/*.php');

    $concat_code .= "<?php\n";
    $concat_code .= "declare(strict_types=1);\n";
    $concat_code .= "namespace Zubr;\n\n";

    foreach ($files as $file) {
        $starting_line = first_function_at($file);
        if ($starting_line === false) {
            throw new Exception('unable to detect function');
        }

        $lines = file($file);
        $offset = $starting_line - 1;

        $concat_code .= implode('', array_slice($lines, $offset));
    }

    $concat_code .= "?>";

    file_put_contents('dist/zubr.php', $concat_code, LOCK_EX);
} catch (Exception $e) {
    trigger_error($e->getMessage(), E_USER_ERROR);
}
