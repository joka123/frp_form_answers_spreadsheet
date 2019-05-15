<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {
        if (TYPO3_MODE === 'BE') {
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Frappant.FrpFormAnswers',
                'web', // Make module a submodule of 'web'
                'formanswers', // Submodule key
                'after:FormFormbuilder', // Position
                [
                    'FormEntry' => 'list, show, prepareExport, export'
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:' . $extKey . '/Resources/Public/Icons/user_mod_formanswers.svg',
                    'labels' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_formanswers.xlf',
                ]
            );
        }

        ExtensionManagementUtility::addLLrefForTCAdescr('tx_frpformanswers_domain_model_formentry', 'EXT:frp_form_answers/Resources/Private/Language/locallang_csh_tx_frpformanswers_domain_model_formentry.xlf');
        ExtensionManagementUtility::allowTableOnStandardPages('tx_frpformanswers_domain_model_formentry');
    },
    $_EXTKEY
);

#if (!class_exists('PHPExcel', true)) {
    #include_once 'phar://' . __DIR__ . '/Resources/Private/Vendors/phpexcel.phar/vendor/autoload.php';
    #  include_once 'phar://' . ExtensionManagementUtility::extPath($_EXTKEY) . '/Resources/Private/Vendors/phpexcel.phar/vendor/autoload.php';
#}
