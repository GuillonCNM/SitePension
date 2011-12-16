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
 * @subpackage Mapper
 * @desc      Abstract model mapper
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-24)
 */

/**
 * @category  Application
 * @package   Model
 * @subpackage Mapper
 * @desc      Abstract model mapper
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-24)
 */
abstract class Application_Model_Mapper_Abstract
{
	protected $_dbTable = null;
	
	/**
	 * Defines DbTable Adapter
	 * @param Zend_Db_Table_Abstract
	 * @return Application_Model_Mapper_Abstract
	 */
	public function setAdapter(Zend_Db_Table_Abstract $adadpter)
	{
		$this->_dbTable = $adadpter;
		return  $this;
	}
	
	/**
	 * Retrieves DbTable Adapter
	 * @return Zend_Db_Table_Abstract
	 */
	public function getAdapter()
	{
		return  $this->_dbTable;
	}
	
}










