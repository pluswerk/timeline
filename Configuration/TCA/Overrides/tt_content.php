<?php
defined('TYPO3_MODE') or die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Pluswerk.Timeline',
            'Timeline',
            'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:pluginWizard.title'
        );

        $pluginSignature = 'timeline_timeline';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            $pluginSignature,
            'FILE:EXT:timeline/Configuration/FlexForm/Timeline.xml'
        );
    }
);
