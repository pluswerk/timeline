<?php

defined('TYPO3_MODE') or die();

$locallangGeneralPath = 'core/Resources/Private/Language/locallang_general.xlf';
$table = 'tx_timeline_domain_model_epoch';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:epoch',
        'label' => 'title',
        'label_userFunc' => \Pluswerk\Timeline\Utility\LabelUtility::class . '->epochLabel',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'hideTable' => true,
        'sortby' => 'sorting',
        'languageField' => 'sys_language_uid',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:timeline/Resources/Public/Icons/Backend/Timeline.svg',
    ],
    'interface' => [
        'showRecordFieldList' => '',
    ],
    'types' => [
        '1' => [
            'showitem' => 'title, startdate, enddate, color, moments,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, hidden, --palette--;;1, starttime, endtime',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:' . $locallangGeneralPath . ':LGL.language',
            'config' => [
                'type' => 'select',
                'readOnly' => false,
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:' . $locallangGeneralPath . ':LGL.allLanguages', -1],
                    ['LLL:EXT:' . $locallangGeneralPath . ':LGL.default_value', 0],
                ],
                'default' => 0,
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:' . $locallangGeneralPath . ':LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'readOnly' => false,
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => $table,
                'foreign_table_where' => 'AND ' . $table . '.pid=###CURRENT_PID### AND ' . $table . '.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'readOnly' => false,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:' . $locallangGeneralPath . ':LGL.hidden',
            'config' => [
                'type' => 'check',
                'readOnly' => false,
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:' . $locallangGeneralPath . ':LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'readOnly' => false,
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:' . $locallangGeneralPath . ':LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'readOnly' => false,
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:epoch.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim',
            ],
        ],
        'startdate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:epoch.startdate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'readOnly' => false,
                'size' => 13,
                'eval' => 'date',
                'checkbox' => 0,
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'enddate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:epoch.enddate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'readOnly' => false,
                'size' => 13,
                'eval' => 'date',
                'checkbox' => 0,
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'color' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:epoch.color',
            'exclude' => true,
            'config' => [
                'type' => 'input',
                'renderType' => 'colorpicker',
                'size' => 10,
            ],
        ],
        'moments' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:epoch.moments',
            'exclude' => true,
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_timeline_domain_model_moment',
                'foreign_field' => 'epoch',
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => true,
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => true,
                        'sort' => true,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true,
                    ],
                ],
            ],
        ],
        'timeline' => [
            'exclude' => true,
            'config' => [
                'type' => 'input',
                'eval' => 'int',
            ],
        ],
    ],
];
