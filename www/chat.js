var lastTimeID = 0;
var lastChatLen = 0;

$(document).ready(function() {
  $('#btnSend').click( function() {
    sendChatText();
    $('#chatInput').val("");
  });
  startChat();
});

function startChat(){
  setInterval( function() { getChatText(); }, 2000);
}

function getChatText() {
  $.ajax({
    type: "GET",
    url: "chatpost.php?lastTimeID=" + lastTimeID
  }).done( function( data )
  {
    var jsonData = JSON.parse(data);
    var jsonLength = jsonData.results.length;
    var html = "";
    for (var i = 0; i < jsonLength; i++) {
      var result = jsonData.results[i];
      html += '<div style="color:#' + result.color + '">(' + result.chattime + ') <b>' + result.usrname +'</b>: ' + result.chattext + '</div>';
      if(result.id > lastTimeID){
        lastTimeID = result.id;
      }
    }
    $('#view_ajax').prepend(html);
  });
}

function sendChatText(){
  var chatInput = $('#chatInput').val();
  if(chatInput != ""){
    $.ajax({
      type: "GET",
      url: "chatpost.php?chattext=" + encodeURIComponent( chatInput )
    }).done( function( data )
    {
      var jsonData = JSON.parse(data);
      if(jsonData.success == false){
        var html = '<div"><b>System</b>: Chat submit failed, try using fewer characters. Backend length was reported at: ' + jsonData["length"] + 
        '<br/>Original Message:<br/>"' + jsonData["chattext"] +'"<br/></div>';
        $('#view_ajax').prepend(html);
      }
    });
  }
}

function ismaxlength(obj){
  var shoutend = 'End of shout.  Shouts are limited to 200 characters!';
  var mlength = 200 
  var shout_message = document.getElementById("chatInput").value;

  // Convert so that HTML Encoding can be accounted for
  var p = document.createElement("p");
  p.textContent = shout_message;
  var converted = p.innerHTML;
  // End conversion
  var shout_messagelength = converted.length;

  document.getElementById("counter").value = 200 - shout_messagelength;
  if (shout_messagelength >= mlength && shout_messagelength > lastChatLen) {
    alert(shoutend);
    document.getElementById("chatInput").value = document.getElementById("chatInput").value.substr(0, mlength);
    lastChatLen = shout_messagelength; //Track prev to stop alerting on backspaces
  }
  else{
    lastChatLen = shout_messagelength;
  }
}