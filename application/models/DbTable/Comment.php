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
 * @subpackage DbTable
 * @desc      Comment model DbTable
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Model
 * @subpackage DbTable
 * @desc      Comment model DbTable
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Model_DbTable_Comment extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$config = array(
					'name' => 'comment',
					'primary' => 'com_id',
					'referenceMap' => array( 
							'Article' => array( 'columns' => array( 'art_id' ),
												 'refTableClass' => 'Application_Model_DbTable_Article',
												 'refColumns' => array( 'art_id'),
												 'onDelete' => self::CASCADE,
												 'onUpdate' => self::CASCADE
												)				
											)
		);
		parent::__construct($config);
	}
	
}