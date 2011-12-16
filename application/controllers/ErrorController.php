<?php
/**
 * Mon Appli
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category  Application
 * @package   Controller
 * @desc      App main error controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Controller
 * @desc      App main error controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class ErrorController extends Zend_Controller_Action
{

	/**
	 * Displays an error
	 */
	public function errorAction()
	{
		$errorHandler = $this->_getParam('error_handler');
		$exception = $errorHandler->exception;
		$this->view->message = $exception->getMessage();
		$this->view->trace   = $exception->getTraceAsString();
		switch ($errorHandler->type) {
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER :
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION :
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE :
				$httpCode = 404;
				break;
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER :
			default :
				$httpCode = 500;
				break;
		}
		$this->getResponse()->setHttpResponseCode($httpCode);
	}
}






