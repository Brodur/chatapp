<?php

  class chatClass
  {
    public static function getRestChatLines($id)
    {
      $arr = array();
      $jsonData = '{"results":[';
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "SELECT id, usrname, chattext, chattime FROM chat WHERE id > ? ORDER BY id DESC LIMIT 10"); ## and chattime >= DATE_SUB(NOW(), INTERVAL 72 HOUR)
      $statement->bind_param( 'i', $id);
      $statement->execute();
      $statement->bind_result( $id, $usrname, $chattext, $chattime);
      $line = new stdClass;
      while ($statement->fetch()) {
        $line->id = $id;
        $line->usrname = $usrname;
        $line->chattext = html_entity_decode($chattext);
        $line->chattime = date('H:i:s', strtotime($chattime));
        $arr[] = json_encode($line);
      }
      $statement->close();
      $db_connection->close();
      $jsonData .= implode(",", $arr);
      $jsonData .= ']}';
      return $jsonData;
    }
    
    public static function setChatLines( $chattext, $usrname) {
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "INSERT INTO chat( usrname, chattext) VALUES(?, ?)");
      $statement->bind_param( 'sss', $usrname, $chattext);
      $statement->execute();
      $statement->close();
      $db_connection->close();
    }
  }
?>
