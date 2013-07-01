<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010-2012 punkt.de GmbH - Karlsruhe, Germany - http://www.punkt.de
 *  Authors: Christian Herberger <herberger@punkt.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
namespace PunktDe\PtPiwik\Model;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FileHandler
 * @package PunktDe\PtPiwik\Model
 */
class FileHandler implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * Gets the content from the configured config file and returns it. Creates the parent directories and the config
	 * file if they don't exist
	 *
	 * @return string
	 */
	public function getConfigurationFileContent() {

		$configurationFile = $this->getConfigurationFile();

		$content = file_get_contents($configurationFile);

		return $content;
	}

	/**
	 * Gets the file path to the config file. Creates parent directories and the config file if they don't exist
	 *
	 * @return string
	 */
	protected function getConfigurationFile() {

		$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pt_piwik']);

		$filePathConfiguration = $extConf['configFilePath'];

		$filePath = GeneralUtility::getFileAbsFileName($filePathConfiguration);

		$this->createFileIfNotExitsts($filePath);

		return $filePath;

	}


	/**
	 * Creates parent directories and the config file if they don't exist
	 *
	 * @param $filePath
	 */
	protected function createFileIfNotExitsts($filePath) {

		if (!is_dir(GeneralUtility::dirname($filePath))) {
			GeneralUtility::mkdir_deep(dirname($filePath));
		}

		if (!is_file($filePath)) {
			$configTemplateFileContent = include GeneralUtility::getFileAbsFileName('EXT:pt_piwik/Configuration/ExtendedConfig/MappingConfTemplate.php');
			GeneralUtility::writeFile($filePath, $configTemplateFileContent);
		}
	}
}
?>