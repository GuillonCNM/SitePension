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
 * @package   Model
 * @desc      Article business model
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Model
 * @desc      Article business model
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Model_Article
{
	/**
	 * @var int
	 */
	private $_id;
	/**
	 * @var int
	 */
	private $_catId;
	/**
	 * @var Application_Model_Category
	 */
	private $_category;
	/**
	 * @var string
	 */
	private $_title;
	/**
	 * @var string
	 */
	private $_content;
	
	/**
	 * @var array
	 */
	private $_comments = null;
	/**
	 * @return the $_id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param int $_id
	 */
	public function setId($_id)
	{
		$this->_id = (int) $_id;
		return $this;
	}

	/**
	 * @return the $_catId
	 */
	public function getCatId()
	{
		return $this->_catId;
	}

	/**
	 * @param int $_catId
	 */
	public function setCatId($_catId) 
	{
		$this->_catId = (int) $_catId;
		return $this;
	}

	/**
	 * @return the $_category
	 */
	public function getCategory() 
	{
		if (null === $this->_category) {
			$categoryMapper = new Application_Model_Mapper_Category();
			$this->_category = $categoryMapper->find($this->_catId);
		}
		return $this->_category;
		
	}

	/**
	 * @param Application_Model_Category $_category
	 */
	public function setCategory(Application_Model_Category $_category)
	{
		$this->_category = $_category;
		return $this;
	}

	/**
	 * @return the $_title
	 */
	public function getTitle()
	{
		return $this->_title;
	}

	/**
	 * @param string $_title
	 */
	public function setTitle($_title)
	{
		$this->_title = (string) $_title;
		return $this;
	}

	/**
	 * @return the $_content
	 */
	public function getContent()
	{
		return $this->_content;
	}

	/**
	 * @param string $_content
	 */
	public function setContent($_content)
	{
		$this->_content = (string) $_content;
		return $this;
	}
	/**
	 * @return the $_comments
	 */
	public function getComments()
	{
		if (null === $this->_comments) {
			$commentMapper = new Application_Model_Mapper_Comment();
			$this->_comments = $commentMapper->selectByArticleId($this->_id);
		}
		return $this->_comments;
	}

	/**
	 * @param array $_comments
	 */
	public function setComments($_comments)
	{
		$this->_comments = $_comments;
		return $this;
	}
	
	public function clearComments()
	{
	    $this->_comments = null;
	    return $this;
	}
	
	public function clearCategory()
	{
	    $this->_category = null;
	    return $this;
	}


}