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
 * @desc      User registration controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Controller
 * @desc      User registration controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class RegisterController extends Zend_Controller_Action
{
	/**
	 * Displays form (GET) or handles form (POST)
	 */
	public function indexAction()
	{
		$id = (int) $this->getRequest()->getParam('id');
		$form = new Application_Form_Register();
		$this->view->message = '';
		
		if ($this->getRequest()->isPost()) {
			$userService = new Application_Service_User;
			$result = $userService->save($form);
			
			if ($result instanceof Application_Model_Register) {
				$this->view->message = "L'utilisateur {$result->getNom()} a bien été créé";
			} elseif (Application_Service_User::USER_CREATION_FAILURE_FORM_INVALID === $result) {
				$this->view->message = "Erreur dans les données du formulaire";
			} else {
				$this->view->message = "Erreur inconnue";
			}
			
//			switch( $result ) {
//				case Application_Service_User::USER_CREATION_FAILURE_F ORM_INVALID:
//					$this->view->message = "Erreur dans les données du formulaire";
//					break;
//				case ($result instanceof Application_Model_Register) :
//					$this->view->message = "L'utilisateur {$result->getNom()} a bien été créé";
//					break;
//				default: 
//					print 'erreur'; exit;
//			}
		}
		
		$this->view->form = $form;
		$this->view->form->setAction('/register/' . $id);
	}
	
}