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
 * @package   Plugin
 * @desc      Application navigation plugin - Builds Zend_Navigate
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @package   Plugin
 * @desc      Application navigation plugin - Builds Zend_Navigate
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Application_Plugin_Navigation extends Zend_Controller_Plugin_Abstract
{
    
    /* (non-PHPdoc)
     * @see Zend_Controller_Plugin_Abstract::routeShutdown()
     */
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        unset($request);
    	$navigation = Zend_Registry::get('Zend_Navigation');
    	$blogContainer = $navigation->findById('blog');
    	
    	$categoryMapper = new Application_Model_Mapper_Category();
    	$categories = $categoryMapper->selectAll();
    	
    	$categoryPages = array();
    	foreach ($categories as $category) {
    		$options = array( 'type' => 'mvc',
    						  'controller' => 'blog',
    						  'action' => 'category',
    						  'params' => array( 'id' => $category->getId()),
    						  'label' => $category->getLabel(),
    						  'route' => 'category',
    		                  'visible' => 1,
    		                  'id' => 'category' . $category->getId(),
    						  'class' => 'parent'
    						);
    						
    		$categoryPage = Zend_Navigation_Page::factory($options);
    		$articlePages = array();
    		foreach ($category->getArticles() as $article) {
    			$options = array( 'type' => 'mvc',
    						  	  'controller' => 'blog',
    						  	  'action' => 'article',
    						 	  'params' => array( 'id' => $article->getId()),
    						 	  'label' => $article->getTitle(),
    						  	  'route' => 'article2',
    		                  	  'visible' => 1,
    		                  	  'id' => 'article' . $article->getId()
    							);
    						
    			$articlePage = Zend_Navigation_Page::factory($options);
    			$articlePages[] = $articlePage;
    		}
    		$categoryPage->addPages($articlePages);
    		$categoryPages[] = $categoryPage;
    	}
    	$blogContainer->addPages($categoryPages);
   	
    }
    
}
