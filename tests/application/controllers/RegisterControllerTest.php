<?php 
class RegisterControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    
    public function setUp()
    {
        $this->bootstrap = new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/configs/application.ini'
        );
        parent::setUp();
    }
    
    public function testRegisterProcess()
    {
        $this->getRequest()
             ->setMethod('POST')
             ->setPost(
                 array(
                     'user_nom' => 'Test',
                     'user_prenom' => 'User',
                     'user_login' => 'testUser',
                     'user_password' => 'azerty123',
                     'user_email' => 'test@mail.com'
                 )
             );
        $this->dispatch('/register/index');
        $this->assertQueryContentContains('p', 'L\'utilisateur Test a bien été créé');
    }
    
    public function testRegisterProcessErrorHandling()
    {
        $this->getRequest()
             ->setMethod('POST')
             ->setPost(
                 array(
                     'user_nom' => 'Test',
                     'user_prenom' => 'User',
                     'user_login' => 'testUser',
                     'user_password' => '12',
                     'user_email' => 'notAnEmail'
                 )
             );
        $this->dispatch('/register/index');
        $this->assertQuery('ul.errors');
    }

}