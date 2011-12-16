<?php 

class CategoryTest extends PHPUnit_Framework_TestCase
{

    public function testCategorySettersAndGetterAreWorkingFine()
    {
        $category = new Application_Model_Category;
        $category->setId(1)
                 ->setLabel('labelTest')
                 ->setArticles(array('article1','article2'));
                 
        $this->assertEquals(1,$category->getId());
        $this->assertEquals('labelTest',$category->getLabel());
        $this->assertEquals(array('article1','article2'),$category->getArticles());
        $category->clearArticles();
        $this->assertInternalType('array', $category->getArticles());
        if (is_array($category->getArticles())) {
            $arrayContainsOnlyArticles =  true;
            foreach ($category->getArticles() as $article) {
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
}