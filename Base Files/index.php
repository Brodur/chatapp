<?php
  session_start();
?>
<?php if(!IsSet($_SESSION[ "usrname" ]) || $_SESSION[ "usrname" ] == ""): ?>
    <!-- Not logged in -->
<html>
  <head>
    <title>Chat Room Example</title>
    <link rel="stylesheet" href="chat.css" />
  </head>
  <body>
    <h1>Please choose a nickname</h1>
    <form action="login.php" method="post">
      <table cellpadding="5" cellspacing="0" border="0">
        <tr>
          <td align="left" valign="top">Nickname :</td>
          <td align="left" valign="top">
            <input type="text" name="usrname" />
          </td>
        </tr>
        <tr>
          <td align="left" valign="top"></td>
          <td align="left" valign="top"><input type="submit" value="Login" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php else: ?> 
    <!-- Logged in -->
    <html>
      <head>
        <title>Chat Room Example</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="chat.js"></script>
        <link rel="stylesheet" href="chat.css" />
      </head>
      <body>
        <div id="ajaxForm">
          <!-- <input type="text" id="chatInput" /> -->
          <textarea name='chatInput' id='chatInput' rows='4' cols='15' maxlength='200' style='display: block; width: 90%; margin: 0 auto;' onkeyDown='return ismaxlength(this)'></textarea>
          <input type="button" value="Send" id="btnSend" />
          <input size='1' class='small' type='text' id='counter' value='200'>
        </div>
        <div id="view_ajax"></div>
      </body>
    </html>
<?php endif ?>