<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "pt_piwik"
 *
 * Auto generated by Extension Builder 2013-06-27
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Extended Tracking for Piwik',
	'description' => 'Extend TSFE with variable table fields, put available fields from TSFE into cookies, generate JS to push custom variables into piwik',
	'category' => 'services',
	'author' => 'Christian Herberger',
	'author_email' => 'herberger@punkt.de',
	'author_company' => 'Punkt.de',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.0.1',
	'constraints' => array(
		'depends' => array(
			'extbase' => '6.0',
			'fluid' => '6.0',
			'typo3' => '6.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>