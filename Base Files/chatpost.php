<?php
// Require config and utilities
require_once( "config.php" );
require_once( "chatClass.php" );
session_start();

// Submit the chat text
if(!empty($_GET['chattext'])){
    $chattext = filter_input(INPUT_GET, 'chattext', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $chattext = htmlspecialchars($chattext);
    // Ensure that the chat text is not empty, and does not exceed 200 characters
    if(strlen($chattext) <= 200 && strlen($chattext) > 0){
        chatClass::setChatLines($chattext, $_SESSION['usrname']);
        print('{"success":true}');
    }
    else{
        $jsonData = '';
        $result = new stdClass;
        $result->success = false;
        $result->length = strlen($chattext);
        $result->chattext = $chattext;
        $arr[] = json_encode($result);
        $jsonData .= implode(",", $arr);
        print $jsonData;
    }
}

// Get the chat lines
if(isset($_GET['lastTimeID'])){
    $id = filter_input(INPUT_GET, 'lastTimeID', FILTER_VALIDATE_INT);
    if($id >= 0){
        $jsonData = chatClass::getRestChatLines( $id );
        print $jsonData;
    }
}
?>