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
namespace PunktDe\PtPiwik\Hooks;

use PunktDe\PtPiwik\Model\FileHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @package pt_dppp_base
 * @subpackage Classes\Utility
 */
class InitFEuser  {

	/**
	 * @var FileHandler
	 * @inject
	 */
	protected $fileHandler;

	/**
	 * This method is called by a hook in t3lib_userauth::start(): hook to manipulate user array on TSFE
	 *
	 * @param   array       Parameters
	 * @param   object      parent Object
	 * @return  void
	 */
	public function extendTsfe($params, $pObj) {

		if (is_array($params['pObj']->fe_user->user) && ($GLOBALS['TSFE']->fe_user instanceof \TYPO3\CMS\Frontend\Authentication\FrontendUserAuthtenication)) {

			$configFileContent = $this->fileHandler->getConfigurationFileContent();
			// TODO use ts parser to make file to ts array
			// TODO fill tsfe
		}
	}

	/**
	 * Set user defined cookies
	 *
	 * @param array $params
	 * @param object $pObj
	 */
	public function setUserCookies($params, $pObj) {
		$cookieData = array();

		// TODO gather defined tsfe fields and write them to $cookieData array

		if (is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['initFeUser']['editCookieData'])) {
			foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['initFeUser']['editCookieData'] as $funcName) {
				$_params = array(
					'cookieData' => &$cookieData,
				);
				GeneralUtility::callUserFunction($funcName, $_params, $this);
			}
		}

		foreach ($cookieData as $cookieName => $cookieValue) {
			setcookie($cookieName, $cookieValue, 0, '/');
		}

	}
}

?>