<?php

return [
    '@PHP82Migration' => true,
    '@PhpCsFixer'     => true, // includes @Symfony

    'blank_line_before_statement' => [
        'statements' => [
            'continue', 'declare', 'do', 'for', 'foreach', 'if', 'return', 'switch', 'throw', 'try', 'while',
        ],
    ],

    'class_definition' => [ 'multi_line_extends_each_single_line' => true ],

    'combine_consecutive_unsets' => true,

    'concat_space' => [ 'spacing' => 'one' ],

    'multiline_whitespace_before_semicolons' => false,

    'no_superfluous_elseif'      => true,
    'no_superfluous_phpdoc_tags' => true,

    'not_operator_with_successor_space' => true,

    'no_empty_comment' => true,

    'no_unset_on_property' => true,

    'phpdoc_add_missing_param_annotation' => false,

    'phpdoc_annotation_without_dot' => true,

    'phpdoc_to_comment' => true,

    'return_assignment' => true,

    'strict_comparison' => true,

    'yoda_style' => [
        'equal'            => false,
        'identical'        => false,
        'less_and_greater' => false,
    ],

    'global_namespace_import' => [
        'import_classes'   => true,
        'import_constants' => true,
        'import_functions' => true,
    ],

    'declare_strict_types' => true,

    'ordered_imports' => [
        'imports_order'  => [ 'class', 'function', 'const' ],
        'sort_algorithm' => 'alpha',
    ],

    'void_return' => false,
];
