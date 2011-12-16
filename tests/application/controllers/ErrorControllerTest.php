<?php 
class ErrorControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    
    public function setUp()
    {
        $this->bootstrap = new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/configs/application.ini'
        );
        parent::setUp();
    }

    public function test404ErrorResponse()
    {
        $this->dispatch('/non/existingRoute');
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertResponseCode(404);
    }
    
    public function test500ErrorResponse()
    {
        $errorHandler = Zend_Controller_Front::getInstance()
            ->getParam('error_handler');
        $errorHandler->exception = new Zend_Exception;
        $errorHandler->type = Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER;
        Zend_Controller_Front::getInstance()
            ->setParam('error_handler', $errorHandler);
            
        $this->dispatch('/error/error');
        $this->assertResponseCode(500);
    }
}