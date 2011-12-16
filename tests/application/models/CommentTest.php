<?php 

class CommentTest extends PHPUnit_Framework_TestCase
{
    
    public function testCommentSettersAndGetterAreWorkingFine()
    {
        $comment = new Application_Model_Comment;
        $comment->setId(10); 
        $this->assertEquals(10,$comment->getId());

    }
}