<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Poster Image',
    'description' => 'Sometimes you just need a poster image (for videos) ... in TYPO3',
    'category' => 'fe',
    'version' => '1.1.1',
    'state' => 'stable',
    'clearcacheonload' => true,
    'author' => 'Benni Mack',
    'author_email' => 'typo3@b13.com',
    'author_company' => 'b13 GmbH',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-13.99.99',
            'filemetadata' => '10.4.0-13.99.99',
        ],
    ],
];
