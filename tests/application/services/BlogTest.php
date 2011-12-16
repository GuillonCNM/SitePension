<?php 

class BlogTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
         $this->_service = new Application_Service_Blog();
    }

    public function testFindcategoryMethodShouldReturnCategoryObject()
    {
         $category = $this->_service->findCategory(1);
         $this->assertInstanceOf('Application_Model_Category', $category);
         
    }
    
    public function testListarticlesMethodShouldReturnArrayOfArticleObjects()
    {
         $articles = $this->_service->listArticles();
         $this->assertInternalType('array', $articles);
        if (is_array($articles)) {
            $arrayContainsOnlyArticles =  true;
            foreach ($articles as $article) {
                 if (!($article instanceof Application_Model_Article)) {
                     $arrayContainsOnlyArticles = false;
                 }
            }
            $this->assertTrue(
                $arrayContainsOnlyArticles,
                'Array contains invalid data'
            );
        }
    }
    
    public function testSavecommentShouldReturnCommentObjectWithArrayGiven()
    {
        $commentArray = array(
            'art_id' => 1,
            'com_content' => 'contenu généré par les TU',
            'com_title' => 'Commentaire TU',
            'com_email' => 'test@mail.com'
        );
        $returnValue = $this->_service->saveComment($commentArray);
        $this->assertInstanceOf('Application_Model_Comment', $returnValue);
    }
    
    public function testSavecommentShouldReturnCommentObjectWithObjectGiven()
    {
        $commentObj = new Application_Model_Comment();
        $commentObj->setArtId(1)
                   ->setContent('contenu généré par les TU')
                   ->setTitle('Commentaire TU')
                   ->setEmail('test@mail.com');
                   
        $returnValue = $this->_service->saveComment($commentObj);
        $this->assertInstanceOf('Application_Model_Comment', $returnValue);
    }
    
    public function testSavecommentShouldReturnCommentObjectWithFormGiven()
    {
        $_POST['art_id'] = 1;
        $_POST['com_content'] = 'contenu généré par les TU';
        $_POST['com_title'] = 'Commentaire TU';
        $_POST['com_email'] = 'test@mail.com';
        $commentForm = new Application_Form_Comment();
        $commentForm->isValid($_POST);
                   
        $returnValue = $this->_service->saveComment($commentForm);
        $this->assertInstanceOf('Application_Model_Comment', $returnValue);
    }
    
    public function testSavecommentShouldReturnConstantWithInvalidFormGiven()
    {
        $_POST['art_id'] = 'string';
        $_POST['com_content'] = 0;
        $_POST['com_title'] = 0;
        $_POST['com_email'] = 'not_a_mail';
        $commentForm = new Application_Form_Comment();
        $commentForm->isValid($_POST);
                   
        $returnValue = $this->_service->saveComment($commentForm);
        $this->assertSame(Application_Service_Blog::COMMENT_CREATION_FAILURE_FORM_INVALID, $returnValue);
    }
    
	/**
     * @expectedException Zend_Exception
     */
    public function testSavecommentShouldReturnExceptionWithInvalidParamGiven()
    {
        $this->_service->saveComment('chaine');
    }
    
    public function testBlogIsNotActivated()
    {
        $this->assertFalse($this->_service->isBlogActivated());
    }
    
public function testSavearticleShouldReturnArticleObjectWithArrayGiven()
    {
        $articleArray = array(
            'cat_id' => 1,
            'art_content' => 'contenu généré par les TU',
            'art_title' => 'Article TU',
        );
        $returnValue = $this->_service->saveArticle($articleArray);
        $this->assertInstanceOf('Application_Model_Article', $returnValue);
    }
    
    public function testSavearticleShouldReturnArticleObjectWithObjectGiven()
    {


        //Zend_Db_Table_Abstract::setDefaultAdapter(new Zend_Test_DbAdapter);

        $articleObj = new Application_Model_Article();
        $articleObj->setCatId(1)
                   ->setContent('200 contenu généré par les TU')
                   ->setTitle('200 Article TU');
                   
        $returnValue = $this->_service->saveArticle($articleObj);
        $this->assertInstanceOf('Application_Model_Article', $returnValue);
    }

	/**
     * @expectedException Zend_Exception
     */
    public function testSavearticleShouldThrowExceptionWithInvalidParamGiven()
    {
        $this->_service->saveArticle('chaine');
    }

     public function tearDown()
    {
    }
}


