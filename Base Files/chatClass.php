<?php
require_once( "config.php" );
require_once( headerpath );
  class chatClass
  {
    public static function getRestChatLines($id)
    {
      $arr = array();
      $jsonData = '{"results":[';
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "SELECT shout_id, shout_name, shout_message, shout_datestamp FROM ".TABLEPREFIX."fanfiction_shoutbox WHERE shout_id > ? ORDER BY shout_id DESC LIMIT 10");
      $statement->bind_param( 'i', $id);
      $statement->execute();
      $statement->bind_result( $id, $authorid, $chattext, $chattime);
      $line = new stdClass;
      
      // Grab date format from header.php
      if(!empty($blocks['shoutbox']['shoutdate'])) $shoutdate = $blocks['shoutbox']['shoutdate'];
      else $shoutdate = $dateformat." ".$timeformat;
      
      while ($statement->fetch()) {
        $line->id = $id;
        $line->usrname = $authorid;
        $line->chattext = html_entity_decode($chattext);
        $line->chattime = date($shoutdate, $chattime);
        $arr[] = json_encode($line);
      }
      $statement->close();
      $db_connection->close();
      $jsonData .= implode(",", $arr);
      $jsonData .= ']}';
      return $jsonData;
    }
    
    public static function setChatLines( $chattext, $authorid) {
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "INSERT INTO ".TABLEPREFIX."fanfiction_shoutbox( shout_name, shout_message) VALUES(?, ?)");
      $statement->bind_param( 'is', $authorid, $chattext);
      $statement->execute();
      $statement->close();
      $db_connection->close();
    }
  }
?>
