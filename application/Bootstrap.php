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
 * @desc      Application main bootstrap file
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */

/**
 * @category  Application
 * @desc      Application main bootstrap file
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    private $_view = null;
//    private $_db = null;
    
    /**
     * View resource accessor
     * @return Zend_View
     */
    private function _getView()
    {
        if (null === $this->_view) {
            $this->bootstrap('view');
            $this->_view = $this->getResource('view');
        }
        
        return $this->_view;
    }
    
//	private function _getDb()
//    {
//        if (null === $this->_db) {
//            $this->bootstrap('db');
//            $this->_db = $this->getResource('db');
//        }
//        
//        return $this->_db;
//    }
    
    /**
     * Configures router
     */
    protected function _initRouter()
    {
        $this->bootstrap('frontController');
        $router = $this->getResource('frontController')->getRouter();
        $configFile = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'routes.ini';
        $routerConfig = new Zend_Config_Ini($configFile, 'production');
        $router->addConfig($routerConfig, 'routes');
    }
    
    /**
     * Configures headLink view helper - injects css calls
     */
    protected function _initHeadLink()
    {
        $this->_getView()->headLink()->appendStylesheet('/css/styles.css');
        $this->_getView()->headLink()->appendStylesheet('/css/menu.css');
    }
    
    /**
     * Adds env status information to title tag
     */
    protected function _initHeadTitle()
    {
        $this->_getView()->headTitle()->setSeparator(' - ');
        if ('development' == APPLICATION_ENV) {
            $this->_getView()->headTitle('[ENV]', 'APPEND');
        }
    }
    
    /**
     * Defines basic metadata informations
     */
    protected function _initHeadMeta()
    {
        $this->_getView()->headMeta()->appendName('keywords', 'zend, puissance, flexible')
                         ->headMeta()->appendName('author', 'Martial Saunois')
                         ->headMeta()->appendName('generator', 'Zend Studio');
    }
    
    /**
     * Configures headScript view helper - injects js calls
     */
    protected function _initHeadScript()
    {
        $this->_getView()->headScript()->appendFile('/js/jquery.js');
        $this->_getView()->headScript()->appendFile('/js/menu.js');
    }
    
    /**
     * Configures inlineScript view helper - injects js calls
     */
    protected function _initInlineScript()
    {
       // $this->_getView()->inlineScript()->appendFile('/js/script.js');
    }
    
    /**
     * Builds Zend_Navigation and stores it in registry
     */
    protected function _initNavigation()
    {
        $configFile = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'navigation.xml';
        $navConfig = new Zend_Config_Xml($configFile, 'main');
        $navContainer = new Zend_Navigation($navConfig);

        $this->_getView()->navigation($navContainer);
        Zend_Registry::set('Zend_Navigation', $navContainer);
    }

}














