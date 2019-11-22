<?php

/**
 * JaxWilko/cute-php-wordlist-generator
 *
 * @author JaxWilko <me@jackwilky.com>
 * @date 2019-11-22
 * @licence MIT
 *
 * usage: php index.php depth=16] [start-level=6] > /path/to/output
 *
 */

function get($level)
{
    $level--;
    foreach (range(33, 126) as $ord) {
        if ($level !== 0) {
            foreach (get($level) as $chr) {
                yield $chr . chr($ord);
            }
        }
        yield chr($ord);
    }
}

$depth = $argv[1] ?? 16;
$level = $argv[2] ?? 6;

while ($level < $depth) {
    foreach (range(++$level, $depth) as $index) {
        foreach (get(++$index) as $string) {
            echo $string . PHP_EOL;
        }
    }
}

