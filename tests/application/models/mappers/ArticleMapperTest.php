<?php 

class ArticleMapperTest extends PHPUnit_Framework_TestCase
{
    public function testFindMethodDhouldReturnArticleObject()
    {
        $dataMapper = new Application_Model_Mapper_Article;
        
        $rowMock = $this->getMock('Zend_Db_Table_Row');
        $rowMock->art_id = 1;
        $rowMock->art_content = 'estrf';
        $rowMock->art_title = 'fsdfd';
        $rowMock->cat_id = 1;
        
        $rowsMock = $this->getMockBuilder('Zend_Db_Table_Rowset')
                         ->disableOriginalConstructor()
                         ->getMock();
        $rowsMock->expects($this->any())
               ->method('current')
               ->will($this->returnValue($rowMock));
               
        $dbMock = $this->getMock('Zend_Db_Table_Abstract');
        $dbMock->expects($this->any())
               ->method('find')
               ->will($this->returnValue($rowsMock));
        $dataMapper->setAdapter($dbMock);
               
        $article = $dataMapper->find(55);
        $this->assertInstanceOf('Application_Model_Article',$article);
    }
    
    public function testSaveMethodForUpdate()
    {
        $dataMapper = new Application_Model_Mapper_Article;
        $dbMock = $this->getMock('Zend_Db_Table_Abstract');
        $dbMock->expects($this->any())
               ->method('update')
               ->will($this->returnValue(1));
        $dataMapper->setAdapter($dbMock);
        
        $article = new Application_Model_Article();
        $article->setId(10);
        $dataMapper->save($article);
    }
    
    public function testDeleteMethod()
    {

        $dataMapper = new Application_Model_Mapper_Article;
        $dbMock = $this->getMock('Zend_Db_Table_Abstract');
        $dbMock->expects($this->any())
               ->method('delete')
               ->will($this->returnValue(1));
        $dataMapper->setAdapter($dbMock);
        
        $article = new Application_Model_Article();
        $result = $dataMapper->delete($article);
        $this->assertEquals(1, $result);
    }
    
    public function testSaveMethodForInsert()
    {
        $dataMapper = new Application_Model_Mapper_Article;
        $dbMock = $this->getMock('Zend_Db_Table_Abstract');
        $dbMock->expects($this->any())
               ->method('insert')
               ->will($this->returnValue(1));
        $dataMapper->setAdapter($dbMock);
        
        $article = new Application_Model_Article();
        $article->setTitle('testMock');
        $dataMapper->save($article);
               
    }
}






