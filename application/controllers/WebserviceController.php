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
 * @desc      Webservice frontend controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Controller
 * @desc      Webservice frontend controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class WebserviceController extends Zend_Controller_Action
{
	/* (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
	}
	
	/**
	 * Handles SOAP requests
	 */
	public function soapAction()
	{
		$options = array( 'soap_version' => SOAP_1_2);
		$server = new Zend_Soap_Server('http://site1.debian.formation.local/webservice/wsdl', $options);
		$server->setObject(new Application_Service_Blog);
		$server->handle();
	}
	
	/**
	 * Handles WSDL queries
	 */
	public function wsdlAction()
	{
		$autodiscover = new Zend_Soap_AutoDiscover();
		$autodiscover->setClass('Application_Service_Blog');
		$autodiscover->setUri('http://site1.debian.formation.local/webservice/soap');
		$autodiscover->handle();
	}


}










