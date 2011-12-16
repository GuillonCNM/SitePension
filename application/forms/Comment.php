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
 * @package   Form
 * @desc      Comment creation form
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Form
 * @desc      Comment creation form
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Form_Comment extends Zend_Form
{
	public function init()
	{
		$this->setMethod('post')
		     ->setName('FormComment');
		
		$artIdField = new Zend_Form_Element_Hidden('art_id');
		$artIdField->setValue(Zend_Controller_Front::getInstance()->getRequest()->getParam('id'))
				   ->setRequired(true)
				   ->addValidator(new Zend_Validate_Int());
				   
		$commentField = new Zend_Form_Element_Textarea('com_content');
		$commentField->setRequired(true)
					 ->addValidator(
					     new Zend_Validate_StringLength(
					         array(
					 			'min' => 3,
					 			'max' => 120)
					     )
                     )
					 ->addFilter(new Zend_Filter_StripTags());
					 
		$commentTitle = new Zend_Form_Element_Text('com_title');			 
		$commentTitle->setRequired(true)
					 ->addValidator(
					     new Zend_Validate_StringLength(
					         array(
					         	'min' => 3,
					 			'max' => 60
					         )
					     )
					 )
					 ->addFilter(new Zend_Filter_StripTags());
					 
		$commentEmail = new Zend_Form_Element_Text('com_email');						 
		$commentEmail->setRequired(true)
					 ->addValidator(new Zend_Validate_EmailAddress());
		
		$commentSubmit = new Zend_Form_Element_Submit('com_submit');
		
		$commentReset = new Zend_Form_Element_Reset('com_reset');
		
		$this->addElement($artIdField);
		$this->addElement($commentTitle);
		$this->addElement($commentEmail);
		$this->addElement($commentField);
		$this->addElement($commentSubmit);
		$this->addElement($commentReset);
		
	}
}










