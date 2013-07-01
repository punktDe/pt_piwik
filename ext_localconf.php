<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// require(t3lib_extMgm::extPath('pt_piwik').'Classes/Hooks/InitFEuser.php');
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['initFEuser'][] = '\PunktDe\PtPiwik\Hooks\InitFEuser->extendTsfe';
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['initFEuser'][] = '\PunktDe\PtPiwik\Hooks\InitFEuser->setUserCookies';
?>