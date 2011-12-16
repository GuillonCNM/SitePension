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
 * @desc      Blog controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Controller
 * @desc      Blog controller
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class BlogController extends Zend_Controller_Action
{
	/**
	 * Blog service instance
	 * @var unknown_type
	 */
	private $_blogService;
	
	/* (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init()
	{
		$this->_blogService = new Application_Service_Blog();
	}
	/**
	 * Displays blog categories
	 */
	public function indexAction()
	{
		$this->view->categories = $this->_blogService->listAllCategories();
	}
	
	/**
	 * Displays a given category
	 */
	public function categoryAction()
	{
		$id = (int) $this->getRequest()->getParam('id');
		$this->view->category = $this->_blogService->findCategory($id);
	}
	
	/**
	 * Displays a given article
	 */
	public function articleAction()
	{
		$id = (int) $this->getRequest()->getParam('id');
		$this->view->article = $this->_blogService->findArticle($id);
		
		$form = new Application_Form_Comment();
		
		if ($this->getRequest()->isPost()) {
		    $result = $this->_blogService->saveComment($form);
		    
			if ($result instanceof Application_Model_Comment) {
			    $this->view->message = "Le commentaire {$result->getTitle()} a bien été créé";
			} elseif (Application_Service_Blog::COMMENT_CREATION_FAILURE_FORM_INVALID == $result) {
			    $this->view->message = "Erreur dans les données du formulaire";
			} else {
			    $this->view->message = "Erreur inconnue";
			}
		}
		
		$this->view->form = $form;
		$this->view->form->setAction('/blog/article/id/' . $id);
	}
	
}





