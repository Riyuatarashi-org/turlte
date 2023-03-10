<?php

declare( strict_types=1 );

// Using php 8.2 with php-cs-fixer 2.19.0 causes a fatal error
putenv('PHP_CS_FIXER_IGNORE_ENV=true');

$baseDir = __DIR__ . '/../../';

$finder = Symfony\Component\Finder\Finder::create()
                                         ->files()
                                         ->name('*.php')
                                         ->in([
                                             $baseDir . 'app',
                                             $baseDir . 'config',
                                             $baseDir . 'database',
                                             $baseDir . 'lang',
                                             $baseDir . 'routes',
                                             $baseDir . 'tests',
                                         ]);

return ( new \PhpCsFixer\Config() )
    ->setRules(
        include __DIR__ . '/php-cs-fixer-rules.php',
    )
    ->setFinder($finder);
