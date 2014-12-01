<?php
    error_reporting(-1); // Report all type of errors
    ini_set('display_errors', 1); // Display all errors
    ini_set('output_buffering', 0); // Do not buffer outputs, write directly
    include('../autoloader.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Test FlashInfo</title>
        <link rel="stylesheet" type="text/css" href="css/flash.css"/>
    </head>
    <body>
        <?php
            $flasher = new \vhaa\FlashInfo\CFlashInfo;
            
            $flasher->createFlash('This is a flash info message!');
            $infoHTML = $flasher->getMessageHTML();
            
            $flasher->createFlash('This is a flash success message!', 'success');
            $successHTML = $flasher->getMessageHTML();
            
            $flasher->createFlash('This is a flash failed message!', 'failed');
            $failedHTML = $flasher->getMessageHTML();
        ?>
        <h2>FlashInfo</h2>
        <p>This is a flash info message:</p>
        <?=$infoHTML?>
        <p>This is a flash success message:</p>
        <?=$successHTML?>
        <p>This is a flash failed message:</p>
        <?=$failedHTML?>    
    </body>
</html>