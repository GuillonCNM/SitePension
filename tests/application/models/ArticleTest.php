<?php 

class ArticleTest extends PHPUnit_Framework_TestCase
{
    
    public function testArticleSettersAndGetterAreWorkingFine()
    {
        $article = new Application_Model_Article;
        $category = new Application_Model_Category;
        $comments = array('comment');
        $article->setId(10)
                ->setCatId(1)
                ->setCategory($category)
                ->setComments($comments)
                ->setTitle('labelTest')
                ->setContent('contentTest');

        $this->assertEquals(10,$article->getId());
        $this->assertEquals(1,$article->getCatId());
        $this->assertSame($category,$article->getCategory());
        $this->assertSame($comments,$article->getComments());
        $this->assertEquals('labelTest',$article->getTitle());
        $this->assertEquals('contentTest',$article->getContent());
        $article->clearComments();
        $article->clearCategory();
        $this->assertInstanceOf('Application_Model_Category', $article->getCategory());
        $this->assertInternalType('array', $article->getComments());
        if (is_array($article->getComments())) {
            $arrayContainsOnlyComments =  true;
            foreach ($article->getComments() as $comment) {
                 if (!($comment instanceof Application_Model_Comment)) {
                     $arrayContainsOnlyComments = false;
                 }
            }
            $this->assertTrue(
                $arrayContainsOnlyComments,
                'Array contains invalid data'
            );
        }
        
    }
}