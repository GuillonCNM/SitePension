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
 * @desc      Comment business model
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Model
 * @desc      Comment business model
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Model_Comment
{
	/**
	 * @var int
	 */
	private $_id;
	/**
	 * @var int
	 */
	private $_artId;
	/**
	 * @var string
	 */
	private $_content;
	/**
	 * @var string
	 */
	private $_title;
	/**
	 * @var string
	 */
	private $_email;
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
	 * @return the $_artId
	 */
	public function getArtId()
	{
		return $this->_artId;
	}

	/**
	 * @param int $_artId
	 */
	public function setArtId($_artId)
	{
		$this->_artId = (int) $_artId;
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
		$this->_title = $_title;
		return $this;
	}

	/**
	 * @return the $_email
	 */
	public function getEmail()
	{
		return $this->_email;
	}

	/**
	 * @param string $_email
	 */
	public function setEmail($_email)
	{
		$this->_email = (string) $_email;
		return $this;
	}
	


}