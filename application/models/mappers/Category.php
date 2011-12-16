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
 * @desc      Category model mapper
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Model
 * @subpackage Mapper
 * @desc      category model mapper
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Model_Mapper_Category extends Application_Model_Mapper_Abstract
{
	public function __construct()
	{
		$this->_dbTable = new Application_Model_DbTable_Category();
	}
	
	/**
	 * Finds a category for a given id
	 * @param int $id
	 * @return Application_Model_Category
	 */
	public function find($id)
	{
		$row = $this->_dbTable->find($id)->current();
		return $this->_rowToObject($row);
	}
	
	/**
	 * Inserts or updates a category
	 * @param Application_Model_Category $category
	 */
	public function save(Application_Model_Category $category)
	{
		$data = $this->_objectToArray($category);
		
		if (0 === (int) $category->getId()) {
			unset($data['cat_id']);
			return $this->_dbTable->insert($data);
		} else {
			$where = array('cat_id = ?' => $category->getId());
			return $this->_dbTable->update($data, $where);
		}
	}
	

	/**
	 * Deletes a category for a given id
	 * @param Application_Model_Category $category
	 */
	public function delete(Application_Model_Category $category)
	{
		$where = array('cat_id = ?' => $category->getId());
		return $this->_dbTable->delete($where);
	}
	
	/**
	 * Lists all categories
	 * @return multitype:Application_Model_Category 
	 */
	public function selectAll()
	{
		$rowSet = $this->_dbTable->fetchAll();
		$categories = array();
		foreach ($rowSet as $row) {
			$categories[] = $this->_rowToObject($row);
		}
		return $categories;
	}
	
	/**
	 * Builds a category from a Zend_Db_Table_Row object
	 * @param Zend_Db_Table_Row $row
	 * @return Application_Model_Category
	 */
	private function _rowToObject(Zend_Db_Table_Row $row) 
	{
		$category = new Application_Model_Category();
		$category->setId($row->cat_id)
				 ->setLabel($row->cat_label);
		return $category;
	}
	
	/**
	 * Builds an array from object's properties
	 * @param Application_Model_Category $category
	 * @return array
	 */
	private function _objectToArray(Application_Model_Category $category)
	{
		$data = array();
		$data['cat_id'] = $category->getId();
		$data['cat_label'] = $category->getLabel();
		return $data;
	}
}










