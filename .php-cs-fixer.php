<?php
$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('bootstrap')
    ->exclude('storage')
    ->in(__DIR__)
    ->name('*.php')
    ->notPath('public/index.php');

$config = new PhpCsFixer\Config();

return $config->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => ['return'],
    ],
    'combine_consecutive_unsets' => true,
    'concat_space' => ['spacing' => 'one'],
    'declare_equal_normalize' => true,
    'function_typehint_space' => true,
    'include' => true,
    'lowercase_cast' => true,
    'no_extra_blank_lines' => [
        'tokens' => [
            'extra',
            'use',
            'use_trait',
        ],
    ],
    'no_leading_namespace_whitespace' => true,
    'no_trailing_whitespace' => true,
    'no_unused_imports' => true,
    'no_whitespace_before_comma_in_array' => true,
    'phpdoc_align' => false,
    'phpdoc_indent' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_scalar' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'phpdoc_var_without_name' => true,
    'return_type_declaration' => true,
    'single_quote' => true,
    'single_blank_line_before_namespace' => true,
    'single_class_element_per_statement' => true,
    'single_import_per_statement' => true,
    'single_line_after_imports' => true,
    'switch_case_semicolon_to_colon' => true,
    'switch_case_space' => true,
    'visibility_required' => true,
    'binary_operator_spaces' => [
        'default' => 'align_single_space',
        'operators' => ['=>' => 'align_single_space'],
    ],
    'array_indentation' => true,
    ])
    ->setFinder($finder);
