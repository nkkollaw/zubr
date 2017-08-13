<?php
require_once 'vendor/autoload.php';
require_once realpath(__DIR__ . '/../../src/') . '/in_array.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

define('LOCUTUS_DIR', __DIR__ . '/locutus/website/source/php'); // contains website files built with `npm run injectweb`
define('LOCUTUS_COMMENT_PATTERN', '/---(.*?)---/s'); // delimitates comment block

$ignore = [// folders or files to ignore
    '_helpers',
    'index.html'
];

$functions = [];

if (!is_dir(LOCUTUS_DIR) || !is_readable(LOCUTUS_DIR)) {
    throw new Exception('did you build Locutus..? See README');
}

foreach (glob(LOCUTUS_DIR . '/*') as $path) {
    if (\Zubr\in_array($ignore, basename($path))) {
        continue;
    }

    $files = glob($path . '/*');

    echo "\n\n---\n";

    foreach ($files as $file) {
        try {
            $file_name = basename($file);
            echo "\n Processing $path/$file_name...";

            if (\Zubr\in_array($ignore, basename($file))) {
                echo "\n > Skip.";

                continue;
            }

            $file_contents = file_get_contents($file);
            $matches = [];
            preg_match(LOCUTUS_COMMENT_PATTERN, $file_contents, $matches);
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

            $functions[$function_info['name']] = $function_info;
        } catch (Exception $e) {
            echo "\n > ERROR: " . $e->getMessage();

            continue;
        }
    }
}

var_dump($functions);
