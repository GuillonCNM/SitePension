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
 * @package   Service
 * @desc      Application blog service layer
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
/**
 * @category  Application
 * @package   Service
 * @desc      Application blog service layer
 * @author    DEV19 <dev@dev19.com>
 * @copyright Copyright (c) 2011 DEV19
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   1.0 (2011-11-23)
 */
final class Application_Service_Blog
{
    const ARTICLE_CREATION_FAILURE_FORM_INVALID = 'articleCreationFailureFormInvalid';
    const COMMENT_CREATION_FAILURE_FORM_INVALID = 'commentCreationFailureFormInvalid';
    const ARTICLE_CREATION_SUCCESS = 'articleCreationSuccess';
    const COMMENT_CREATION_SUCCESS = 'commentCreationSuccess';
    
    /**
     * Find a category
     * @param int $id numeric id of category in db (primary key)
     * @return Application_Model_Category
     */
    public function listAllCategories()
    {
    	$categoryMapper = new Application_Model_Mapper_Category;
    	return $categoryMapper->selectAll();
    }
    public function findCategory ($id)
    {
        $categoryMapper = new Application_Model_Mapper_Category;
        return $categoryMapper->find((int) $id);
    }
    /**
     * Finds all articles
     * @return array Array of articles (Application_Model_Category)
     */
    public function listArticles ()
    {
        $articleMapper = new Application_Model_Mapper_Article;
        return $articleMapper->selectAll();
    }
    /**
     * Save a comment
     * @param array|Application_Model_Comment|Zend_Form $comment
     * @throws Zend_Exception
     * @return string|Application_Model_Comment 
     */
    public function saveComment ($comment)
    {
        if (is_array($comment)) {
            $commentObj = new Application_Model_Comment();
            $commentObj->setArtId($comment['art_id'])
                ->setContent($comment['com_content'])
                ->setTitle($comment['com_title'])
                ->setEmail($comment['com_email']);
        } elseif ($comment instanceof Application_Model_Comment) {
            $commentObj = $comment;
        } elseif ($comment instanceof Zend_Form) {
            if ($comment->isValid($_POST)) {
                $commentObj = new Application_Model_Comment();
                $commentObj->setArtId($comment->getValue('art_id'))
		                   ->setContent($comment->getValue('com_content'))
		                   ->setTitle($comment->getValue('com_title'))
		                   ->setEmail($comment->getValue('com_email'));
                $comment->reset();
            } else {
                return self::COMMENT_CREATION_FAILURE_FORM_INVALID;
            }
        } else {
            throw new Zend_Exception(
            	'Parameter 1 must be an array, an instance
            	of Application_Model_Comment or Zend_Form, ' .
                gettype($comment) . ' given'
            );
        }
        $commentMapper = new Application_Model_Mapper_Comment;
        $commentMapper->save($commentObj);
        return $commentObj;
    }
    /**
     * Saves an article
     * @param array|Application_Model_Article|Zend_Form $article
     * @throws Zend_Exception
     * @return string|Application_Model_Article
     */
    public function saveArticle ($article)
    {
        if (is_array($article)) {
            $articleObj = new Application_Model_Article();
            $articleObj->setCatId($article['cat_id'])
                ->setContent($article['art_content'])
                ->setTitle($article['art_title']);
        } elseif ($article instanceof Application_Model_Article) {
            $articleObj = $article;
        } elseif ($article instanceof Zend_Form) {
            if ($article->isValid($_POST)) {
                $articleObj = new Application_Model_Article();
				$articleObj->setCatId($article->getValue('cat_id'))
				    ->setTitle($article->getValue('art_content'))
				    ->setContent($article->getValue('art_title'));
				$article->reset();
            } else {
                return self::ARTICLE_CREATION_SUCCESS;
            }
        } else {
            throw new Zend_Exception(
            	'Parameter 1 must be an array, an instance
            	of Application_Model_Article or Zend_Form, ' . 
                gettype($article) . ' given'
            );
        }
        
        $articleMapper = new Application_Model_Mapper_Article;
        $articleMapper->save($articleObj);
        return $articleObj;
    }
    public function findArticle($id)
    {
    	$articleMapper = new Application_Model_Mapper_Article;
    	return $articleMapper->find($id);
    }
    public function isBlogActivated()
    {
        return false;
    }
}