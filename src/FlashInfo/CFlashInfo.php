<?php

namespace vhaa\FlashInfo;

class CFlashInfo 
{
    public static $MSG_TYPE_INFO = 'info';
    public static $MSG_TYPE_SUCCESS = 'success';
    public static $MSG_TYPE_FAILED = 'failed';    
    
    public function __construct()
    {
        
    }
    
    /**
    * Set message in session, and type
    * @param string $msg message to be displayed
    * @param string $type type of message
    **/
    public function createFlash($msg = 'Flash Message', $type = 'info')
    {
        $_SESSION['flash-info'] = [
            'type' => $type,
            'message' => $msg
        ];
    }
    
    public function setMessage($msg = 'Flash Message')
    {
        $_SESSION['flash-info']['message'] = $msg;
    }
    
    /**
    * Get the message from session, and unset it
    **/
    public function getMessageInfo()
    {
        $msg = $_SESSION['flash-info'];
        $this->unsetMessage();
        return $msg;
    }
    
    public function setType($type = 'info')
    {
        $_SESSION['flash-info']['type'] = $type;  
    }
    
    public function getType()
    {
        return $_SESSION['flash-info']['type'];
    }
    
    public function checkMessageSet()
    {
        if(isset($_SESSION['flash-info']))
            return true;
        else
            return false;
    }
    
    public function unsetMessage()
    {
        if(isset($_SESSION['flash-info']))
            unset($_SESSION['flash-info']);
    }
    
    public function getMessageHTML()
    {
        if(isset($_SESSION['flash-info']))
        {
            $html = <<<EOD
                <div class="flash_{$_SESSION['flash-info']['type']}">
                    <p class="flash_text">
                        {$_SESSION['flash-info']['message']}
                    </p>
                </div>
EOD;
            $this->unsetMessage();
            return $html;
        }
    }
}