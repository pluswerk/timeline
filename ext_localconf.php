<?php

defined('TYPO3_MODE') or die('Access denied.');

/** @var string $_EXTKEY */
call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Pluswerk.Timeline',
        'Timeline',
        [
            'Timeline' => 'list',
        ],
        // non-cacheable actions
        [
            'Timeline' => '',
        ]
    );
    if (TYPO3_MODE === 'BE') {
        /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'ext-timeline-wizard-icon',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:timeline/Resources/Public/Icons/Backend/Timeline.svg']
        );
    }
}, $_EXTKEY);
