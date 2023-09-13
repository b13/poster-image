<?php

if ((new \TYPO3\CMS\Core\Information\Typo3Version())->getMajorVersion() > 11) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'sys_file_metadata',
        [
            'poster' => [
                'label' => 'LLL:EXT:poster_image/Resources/Private/Language/locallang.xlf:sys_file_metadata.poster',
                'l10n_mode' => 'exclude',
                'config' => [
                    'type' => 'link',
                    'allowedTypes' => ['file'],
                    'appearance' => [
                        'enableBrowser' => true,
                        'allowedOptions' => [],
                        'allowedFileExtensions' => explode(',', $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
                    ],
                ],
            ],
        ]
    );
} else {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'sys_file_metadata',
        [
            'poster' => [
                'label' => 'LLL:EXT:poster_image/Resources/Private/Language/locallang.xlf:sys_file_metadata.poster',
                'l10n_mode' => 'exclude',
                'config' => [
                    'type' => 'text',
                    'renderType' => 'inputLink',
                    'max' => 255,
                    'eval' => 'trim,null',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'allowedExtensions' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                                'blindLinkFields' => 'class,target,title',
                                'blindLinkOptions' => 'page,mail,folder,file,telephone',
                            ],
                        ],
                    ],
                    'allowedTypes' => ['file'],
                ],
            ],
        ]
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_file_metadata',
    'poster',
    TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO,
    'after:caption'
);
