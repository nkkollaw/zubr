<?php
require_once 'vendor/autoload.php';
require_once realpath(__DIR__ . '/../../src/') . '/in_array.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
use nkkollaw\Utils\Strings\Strings as StrUtils;

define('PHPSTORM_DIR', __DIR__ . '/phpstorm-stubs/standard');
define('PHPSTORM_IGNORE', '_standard_manual.php, _types.php, standard_defines.php');
define('PHPSTORM_FUNC_REGEX', '/(function .*})/U'); // functions declarations

define('LOCUTUS_DIR', __DIR__ . '/locutus/website/source/php'); // contains website files built with `npm run injectweb`
define('LOCUTUS_IGNORE', '_helpers, index.html');
define('LOCUTUS_COMMENT_REGEX', '/---(.*?)---/s'); // delimitates comment block

define('SRC_DIR', realpath('./../../src/'));
define('TESTS_DIR', realpath('./../../tests/'));

try {
    // checks
    if (!is_dir(PHPSTORM_DIR) || !is_readable(PHPSTORM_DIR)) {
        throw new Exception('PHPStorm missing');
    }
    if (!is_dir(LOCUTUS_DIR) || !is_readable(LOCUTUS_DIR)) {
        throw new Exception('did you build Locutus..? See README');
    }

    // Build index of functions from tests
    $functions = [];
    $ignore = array_map(function($elem) {
        return trim($elem);
    }, explode(',', LOCUTUS_IGNORE));

    foreach (glob(LOCUTUS_DIR . '/*') as $path) {
        if (\Zubr\in_array($ignore, basename($path))) {
            continue;
        }

        $files = glob($path . '/*');

        echo "\n\n---\n";

        foreach ($files as $file) {
            try {
                echo "\n Processing $file...";

                if (\Zubr\in_array($ignore, basename($file))) {
                    echo "\n > Skip.";

                    continue;
                }

                $file_contents = file_get_contents($file);
                $matches = [];
                preg_match(LOCUTUS_COMMENT_REGEX, $file_contents, $matches);
                $comment_block = $matches[1];

                try {
                    $comment_block = Yaml::parse($comment_block);
                } catch (ParseException $e) {
                    printf("\n > ERROR! Unable to parse the YAML string: %s", $e->getMessage());

                    continue;
                }

                if (!isset($comment_block['function']) || !$comment_block['function']) {
                    throw new Exception('no function name');
                }

                $function_info = [
                    'name' => $comment_block['function'],
                    'category' => $comment_block['category'],
                    'link' => @(new IjorTengab\parseHTML($comment_block['description']))->find('a')->attr('href'),
                    'tests' => []
                ];
                for ($i=0; $i<count($comment_block['examples']); $i++) {
                    $function_info['tests'][$i] = [
                        'code' => $comment_block['examples'][$i],
                        'returns' => $comment_block['returns'][$i]
                    ];
                }

                $functions[$function_info['name']] = $function_info;
            } catch (Exception $e) {
                echo "\n > ERROR: " . $e->getMessage();

                continue;
            }
        }
    }

    // index PHPStorm stubs
    $stubs = [];
    $ignore = array_map(function($elem) {
        return trim($elem);
    }, explode(',', PHPSTORM_IGNORE));

    foreach (glob(PHPSTORM_DIR . '/*.php') as $file) {
        try {
            echo "\n Processing $file...";

            if (\Zubr\in_array($ignore, basename($file))) {
                echo "\n > Skip.";

                continue;
            }

            $file_contents = file_get_contents($file);
            $matches = [];
            preg_match_all(PHPSTORM_FUNC_REGEX, $file_contents, $matches);

            foreach ($matches[1] as $function_body) {
                $m = array();
                preg_match('/function (.*)\(/', $function_body, $m);
                $function_name = trim($m[1]);
                if (!$function_name) {
                    throw new Exception('no function name');
                }

                echo "\n > $function_name";

                $stubs[$function_name] = $function_body;
            }
        } catch (Exception $e) {
            echo "\n > ERROR: " . $e->getMessage();

            continue;
        }
    }

    // write files
    // if (!is_dir(__DIR__ . '/dist/')) {
    //     $ok = mkdir(__DIR__ . '/dist/');
    //     if (!$ok) {
    //         throw new Exception('unable to created "dist" dir');
    //     }
    // }
    // if (!is_dir(__DIR__ . '/dist/src/')) {
    //     $ok = mkdir(__DIR__ . '/dist/src/');
    //     if (!$ok) {
    //         throw new Exception('unable to created "src" dir');
    //     }
    // }
    // if (!is_dir(__DIR__ . '/dist/tests/')) {
    //     $ok = mkdir(__DIR__ . '/dist/tests/');
    //     if (!$ok) {
    //         throw new Exception('unable to created "tests" dir');
    //     }
    // }

    foreach ($stubs as $function_name => $function_body) {
        if (!isset($functions[$function_name])) {
            // throw new Exception($function_name . ' was missing from the function index.');

            continue;
        }

        // create stub file
        if (!is_dir(SRC_DIR) || !is_writable(SRC_DIR)) {
            throw new Exception('invalid src dir');
        }
        $base_file_path = SRC_DIR . '/' . $function_name . '.php';
        if (is_file($base_file_path)) {
            // we've already implemented this
            continue;
        }
        $file_path = $base_file_path . '.TODO';
        $function_body = str_replace(' { }', "\n{\n    // TODO: implement\n}", $function_body);
        $file_contents = '';
        $file_contents .= <<<EOF
<?php
declare(strict_types=1);

/**
 * \Zubr\\$function_name()
 *
 * @link https://secure.php.net/$function_name
 *
 * NOTES: same as \\$function_name() || in Zubr, \$param_1 goes before \$param_2, and we return an array instead of void
*/
$function_body
EOF;
        file_put_contents($file_path, $file_contents);

        // create tests file
        if (!is_dir(TESTS_DIR) || !is_writable(TESTS_DIR)) {
            throw new Exception('invalid tests dir');
        }
        $class_name = ucwords(StrUtils::toCamelCase($function_name));
        $base_file_path = TESTS_DIR . '/' . $class_name . 'Test.php';
        if (is_file($base_file_path)) {
            // we've already implemented this
            continue;
        }
        $file_path = $base_file_path . '.TODO';
        $file_contents = '';
        $file_contents .= <<<EOF
<?php
declare(strict_types=1);

/* These are tests from Locutus for porting
TODO: implement adding automatically (if it's possible)
\n
EOF;
        foreach ($functions[$function_name]['tests'] as $test_data) {
            $file_contents .= print_r($test_data, true);
        }
        $file_contents .= <<<EOF
*/
class $class_name extends PHPUnit\Framework\TestCase
{
    public function test()
    {
        \$input = ['test1', 'tEsT2', 'TEST3'];
        \$actual = \\Zubr\\$function_name(/* put stuff here */);
        \$expected = \\$function_name(/* put stuff here */);

        \$this->assertEquals(\$expected, \$actual);
    }
}
EOF;
        file_put_contents($file_path, $file_contents);
    }

    echo "\n\n👍🏻  done\n\n";
} catch (Exception $e) {
    echo "\n💀\n\n";

    echo 'ERROR: ' . $e->getMessage();

    echo "\n";

    exit(0);
}
