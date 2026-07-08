<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Poster Image',
    'description' => 'Sometimes you just need a poster image (for videos) ... in TYPO3',
    'category' => 'fe',
    'version' => '2.0.0',
    'state' => 'stable',
    'clearcacheonload' => true,
    'author' => 'Benni Mack',
    'author_email' => 'typo3@b13.com',
    'author_company' => 'b13 GmbH',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-14.99.99',
            'filemetadata' => '13.0.0-14.99.99',
        ],
    ],
];
