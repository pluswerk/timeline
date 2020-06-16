<?php

/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = [
    'title' => '+Pluswerk: Timeline',
    'description' => 'Adds a plugin to create timelines with time periods and moments.',
    'category' => 'plugin',
    'author' => 'Felix König',
    'author_email' => 'felix.koenig@pluswerk.ag',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
