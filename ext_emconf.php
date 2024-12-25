<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'ts_script_handler',
    'description' => 'Helpful extension to get typoscript out of controller context',
    'category' => 'utility',
    'author' => 'Johannes Böttcher',
    'author_email' => 'johannes.boettcher@familie-boettcher.ch',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-13.4.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Jboettcher\\TsScriptHandler\\' => 'Classes/',
        ],
    ],
    'autoload-dev' => [
        'psr-4' => [
            'Jboettcher\\TsScriptHandler\\' => 'Classes/',
        ],
    ],
];
