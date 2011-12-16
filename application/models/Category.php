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
 * @desc      Category business model
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Model
 * @desc      Category business model
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Model_Category
{
	/**
	 * @var int
	 */
	private $_id;
	
	/**
	 * @var string
	 */
	private $_label;
	/**
	 * @var array
	 */
	private $_articles = null;
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
	 * @return the $_label
	 */
	public function getLabel()
	{
		return $this->_label;
	}

	/**
	 * @param string $_label
	 */
	public function setLabel($_label)
	{
		$this->_label = (string) $_label;
		return $this;
	}
	/**
	 * @return the $_articles
	 */
	public function getArticles()
	{
		if (null === $this->_articles) {
			$articleMapper = new Application_Model_Mapper_Article();
			$this->_articles = $articleMapper->selectByCategoryId($this->_id);
		}
		return $this->_articles;
	}

	/**
	 * @param array $_articles
	 */
	public function setArticles(array $_articles)
	{
		$this->_articles = $_articles;
		return $this;
	}
	
	public function clearArticles()
	{
	    $this->_articles = null;
	    return $this;
	}


}