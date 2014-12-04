<?php

namespace vhaa\FlashInfo;

class CFlashInfoTest extends \PHPUnit_Framework_TestCase
{
    private $flasher;
    
    public function setUp()
    {
        $this->flasher = new \vhaa\FlashInfo\CFlashInfo();
    }
    
    /**
    * Test
    * 
    * @return void
    **/
    public function testCreateFlash()
    {
        $flashMessage = 'My message';
        $typeOfFlash = 'info'; //info, success or failed
        $this->flasher->createFlash($flashMessage, $typeOfFlash);
        $flashInfo = $this->flasher->getMessageInfo();
        $msg = $flashInfo['message'];
        $type = $flashInfo['type'];
        $this->assertEquals($flashMessage, $msg, "Flash message missmatch! Created FlashInfo does not contain set message.");
        $this->assertEquals($typeOfFlash, $type, "Flash type missmatch! Created FlashInfo does not match set type.");
    }
    
    public function testCheckMessageSet()
    {
        $flag = $this->flasher->checkMessageSet();
        $this->assertFalse($flag, 'Failure, does not return false when Flash-message is not set!');
        $this->flasher->createFlash('Flash message!', 'info');
        $flag = $this->flasher->checkMessageSet();
        $this->assertTrue($flag, 'Failure, does not return true when Flash-message is set!');
        
    }
    
    public function testSetMessage()
    {
        $this->flasher->createFlash('Flash message!', 'info');
        $newMessage = 'My new flash message!';
        $this->flasher->setMessage($newMessage);
        $flashInfo = $this->flasher->getMessageInfo();
        $msg = $flashInfo['message'];
        $this->assertEquals($newMessage, $msg, "Flash message missmatch! FlashInfo does not contain new set message.");
    }
    
    public function testUnsetMessage()
    {
        $this->flasher->createFlash('Flash message!', 'info');
        $this->flasher->unsetMessage();
        $flag = $this->flasher->checkMessageSet();
        $this->assertFalse($flag, "Unsetting flash message does not work properly.");
    }
    
    public function testSetType()
    {
        $this->flasher->createFlash('Flash message!', 'info');
        $newType = 'success';
        $this->flasher->setType($newType);
        $type = $this->flasher->getType();
        $this->assertEquals($newType, $type, "Type missmatch! Setting new flash message type does not work.");
    }
}