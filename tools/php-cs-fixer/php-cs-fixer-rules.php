<?php

return [
    '@PHP82Migration' => true,
    '@PhpCsFixer'     => true, // includes @Symfony

    'array_syntax' => [ 'syntax' => 'short' ],

    'blank_line_before_statement' => [
        'statements' => [
            'continue', 'declare', 'do', 'for', 'foreach', 'if', 'return', 'switch', 'throw', 'try', 'while',
        ],
    ],

    'class_definition'     => [ 'multi_line_extends_each_single_line' => true ],
    'class_keyword_remove' => false,

    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,

    'compact_nullable_typehint' => true,

    'concat_space' => [ 'spacing' => 'one' ],

    'constant_case' => true,

    'declare_equal_normalize' => [ 'space' => 'single' ],
    'declare_strict_types'    => true,

    'dir_constant' => true,

    'doctrine_annotation_array_assignment' => true,
    'doctrine_annotation_braces'           => true,
    'doctrine_annotation_indentation'      => true,
    'doctrine_annotation_spaces'           => true,

    'explicit_indirect_variable' => true,

    'function_typehint_space' => true,

    'global_namespace_import' => [
        'import_classes'   => true,
        'import_constants' => true,
        'import_functions' => true,
    ],

    'heredoc_to_nowdoc' => true,

    'lowercase_cast'     => true,
    'lowercase_keywords' => true,

    'magic_constant_casing' => true,

    'modernize_types_casting' => true,

    'multiline_whitespace_before_semicolons' => false,

    'native_function_casing' => true,

    'new_with_braces' => true,

    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc'        => true,
    'no_empty_comment'                   => false,
    'no_superfluous_elseif'              => true,
    'no_superfluous_phpdoc_tags'         => true,
    'not_operator_with_successor_space'  => true,
    'no_unset_on_property'               => true,

    'ordered_imports' => [
        'imports_order'  => [ 'class', 'function', 'const' ],
        'sort_algorithm' => 'alpha',
    ],

    'php_unit_method_casing' => [ 'case' => 'snake_case' ],

    'phpdoc_add_missing_param_annotation' => false,
    'phpdoc_annotation_without_dot'       => true,
    'phpdoc_to_comment'                   => true,

    'return_assignment' => true,

    'single_line_comment_style' => [ 'comment_types' => [ 'hash' ] ],

    'strict_comparison' => true,

    'void_return' => false,

    'yoda_style' => [
        'equal'            => false,
        'identical'        => false,
        'less_and_greater' => false,
    ],
];
