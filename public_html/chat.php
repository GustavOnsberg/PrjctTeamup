<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Main page - Project Team-Up</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
      <meta name="description" content="Project Team-Up is a teamup application for entrepenuers. Create teams, projects and start creating with people all around the world.">
        <style>
          body{
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 300;
            width: 100%;
            max-height: 100vh;
            margin: auto;
            background-color: #ecf0f1;
            overflow:hidden; /*to remove the slidebar from the screen*/
          }
          div.menubar{
            width: 20%;
            height: calc(100% - 4em);
            float: left;
            background: rgba(74,201,247,1);
            background: -moz-linear-gradient(top, rgba(74,201,247,1) 0%, rgba(74,201,247,1) 0%, rgba(10,182,245,1) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(74,201,247,1)), color-stop(0%, rgba(74,201,247,1)), color-stop(100%, rgba(10,182,245,1)));
            background: -webkit-linear-gradient(top, rgba(74,201,247,1) 0%, rgba(74,201,247,1) 0%, rgba(10,182,245,1) 100%);
            background: -o-linear-gradient(top, rgba(74,201,247,1) 0%, rgba(74,201,247,1) 0%, rgba(10,182,245,1) 100%);
            background: -ms-linear-gradient(top, rgba(74,201,247,1) 0%, rgba(74,201,247,1) 0%, rgba(10,182,245,1) 100%);
            background: linear-gradient(to bottom, rgba(74,201,247,1) 0%, rgba(74,201,247,1) 0%, rgba(10,182,245,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4ac9f7', endColorstr='#0ab6f5', GradientType=0 );
            margin-top: 4em;
          }
          div.menubar > button{
            background-color: rgba(0,0,0,0);
            border: 0;
            width: 100%;
          }
          div.menubar  .profile{
            width: 90%;
            padding: 5%;
            margin-top: 2%;
            overflow: hidden;
          }
          div.menubar  .profile:hover{
            background-color: #23bef6;
          }
          div.menubar  .profile > .icon{
            position: relative;
            width: 25%;
            overflow: hidden;
            float: left;
          }
          div.menubar  .profile > .icon > img{
            width: 100%;
            float: left;
          }
          div.menubar  .profile > .icon > .status{
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: 1.75vh;
            height: 2.5vh;
            width: 2.5vh;
            float: left;
          }
          div.menubar  .profile > .icon > .green{
            background-color: green;
          }
          div.menubar  .profile > .icon > .red{
            background-color: red;
          }
          div.menubar  .profile > .text{
            float: left;
            margin-left: 3%;
            width: 72%;
          }
          div.menubar  .profile > .text > p{
            margin: 0;
            padding: 0;
            line-height: 1.6em;
          }
          div.chat{
            position: relative;
            height: calc(100% - 4em);
            width: 80%;
            float: left;
            margin-top: 4em;
          }
          div.chat > .top{
            position: relative;
            height: 15%;
            width: 100%;
            background-color: #fff;
          }
          div.chat > .profile{
            
          }
          div.chat > .profile > div div.profileicon{
            display: inline;
            float: left;
          }
          div.chat > .profile > div div.profileicon img{
            height: 60%;
          }
          div.chat > .profile > div div.profileinfo{
            display: inline;
            float: left;
          }
          div.chat > .group{
            position: absolute;
            top: 50%;
            transform: translatey(-50%);
          }
          div.chat > .group > div.chaticon{
            display: block;
            height: 80%;
            float: left;
          }
          div.chat > .group > div.chaticon > img{
            height: 100%;
            float: left;
          }
          div.chat > .group > .groupnameandimage{
            display: inline;
          }
          div.chat > .group > .groupnameandimage > .groupname{
            height: 40%;
          }
          div.chat > .group > .groupnameandimage > .groupimage{
            height: 40%;
          }
          div.chat > .group > .groupnameandimage > .groupimage > img{
            height: 100%;
          }
          div.chat > .group > div.chaticon > img{
            height: 100%;
          }
          div.chat > .messages{
            height: 70%;
            padding-left: 2%;
            padding-right: 2%;
            overflow: scroll;
            overflow-x: hidden;
          }
          div.chat > .messages > .dayline{
            font-size: 1em;
            text-align: center;
            color: #999;
            margin-bottom: 2%;
            margin-top: 2%;
          }
          div.chat > .messages > .dayline > hr{
            width: 50%;
            background-color: #999;
            border:0;
            height: 1px;
          }
          div.chat > .messages > .friendrequestbox{
            color: #999;
            text-align: center;
            margin-bottom: 4%;
          }
          div.chat > .messages > .friendrequestbox > p{
            margin: 0;
            padding: 0;
          }
          div.chat > .messages > .friendrequestbox  a{
            color: #777;
          }
          div.chat > .messages > .friendrequestbox button{
            border: 0;
            border-radius: 25px;
            height: 6%;
            width: 15%;
            margin-top: 2%;
          }
          div.chat > .messages > .friendrequestbox button.accept{
            background-color: #2ecc71;
            color: #fff;
          }
          div.chat > .messages > .friendrequestbox button.accept:hover{
            background: rgba(46,204,112,1);
            background: -moz-linear-gradient(top, rgba(46,204,112,1) 0%, rgba(46,204,112,1) 0%, rgba(38,166,91,1) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(46,204,112,1)), color-stop(0%, rgba(46,204,112,1)), color-stop(100%, rgba(38,166,91,1)));
            background: -webkit-linear-gradient(top, rgba(46,204,112,1) 0%, rgba(46,204,112,1) 0%, rgba(38,166,91,1) 100%);
            background: -o-linear-gradient(top, rgba(46,204,112,1) 0%, rgba(46,204,112,1) 0%, rgba(38,166,91,1) 100%);
            background: -ms-linear-gradient(top, rgba(46,204,112,1) 0%, rgba(46,204,112,1) 0%, rgba(38,166,91,1) 100%);
            background: linear-gradient(to bottom, rgba(46,204,112,1) 0%, rgba(46,204,112,1) 0%, rgba(38,166,91,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2ecc70', endColorstr='#26a65b', GradientType=0 );
          }
          div.chat > .messages > .friendrequestbox button.decline:hover{
            background-color: #999;
          }
          div.chat > .messages > .friendrequestbox button:focus, div.chat > .messages > .friendrequestbox button:active{
            outline:none;
          }
          div.chat > .messages > .messagecontainer{
            width: calc(100%-200px);
            overflow: hidden;
          }
          div.chat > .messages > .messagecontainer > .one{
            background: rgba(30,188,246,1);
            background: -moz-linear-gradient(top, rgba(30,188,246,1) 0%, rgba(30,188,246,1) 0%, rgba(9,157,211,1) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(30,188,246,1)), color-stop(0%, rgba(30,188,246,1)), color-stop(100%, rgba(9,157,211,1)));
            background: -webkit-linear-gradient(top, rgba(30,188,246,1) 0%, rgba(30,188,246,1) 0%, rgba(9,157,211,1) 100%);
            background: -o-linear-gradient(top, rgba(30,188,246,1) 0%, rgba(30,188,246,1) 0%, rgba(9,157,211,1) 100%);
            background: -ms-linear-gradient(top, rgba(30,188,246,1) 0%, rgba(30,188,246,1) 0%, rgba(9,157,211,1) 100%);
            background: linear-gradient(to bottom, rgba(30,188,246,1) 0%, rgba(30,188,246,1) 0%, rgba(9,157,211,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1ebcf6', endColorstr='#099dd3', GradientType=0 );
            padding: 1.5%;
            border-radius: 15px 15px 15px 0px;
            max-width: 70%;
            margin-bottom: 2%;
            color: #fff;
            float: left;
            z-index:1;
          }
          div.chat > .messages > .messagecontainer > .two{
            background-color: #fff;
            padding: 1.5%;
            border-radius: 15px 15px 0px 15px;
            max-width: 70%;
            margin-bottom: 2%;
            float: right;
            z-index:1;
          }
          div.chat  .textarea{
            height: 15%;
            background-color: #fff;
            border-top: 1px solid #dfdfdf;
            z-index: 10;
          }
          div.chat  .textarea .attach{
            position: relative;
            height: 100%;
            width: 7%;
            float: left;
          }
          div.chat  .textarea .attach > img{
            width: 50%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
          }
          div.chat .textarea > div.textarea{
            margin-top: 0.5%;
            margin-bottom: 0.5%;
            height: 90%;
            width: 83%;
            resize: none;
            border:0;
            float: left;
            font-size: 1.3em;
          }
          div.chat  .textarea > div.textarea:focus, div.chat > .textarea > textarea:active{
            outline:none;
          }
          div.chat  .textarea .send{
            position: relative;
            height: 100%;
            width: 10%;
            color: #777;
            float: left;
            transition: all 0.5s;
            -moz-transition: all 0.5s; /* Firefox 4 */
            -webkit-transition: all 0.5s; /* Safari and Chrome */
            -o-transition: all 0.5s; /* Opera */
          }
          div.chat  .textarea .send > p{
            position: absolute;
            padding: 0;
            margin: 0;
            left: 50%;
            top: 50%;
            font-weight: 700;
            transform: translate(-50%, -50%);
            transition: all 0.5s;
            -moz-transition: all 0.5s; /* Firefox 4 */
            -webkit-transition: all 0.5s; /* Safari and Chrome */
            -o-transition: all 0.5s; /* Opera */
          }
          div.chat  .textarea .send:hover{
            background-color: #dfdfdf;
          }
          div.chat  .textarea .send:hover > p{
            color:#48c8f7;
          }
      </style>
    </head>
    <body>
        <?php
        include("_header_white.php");
        ?>
        <div class="menubar" id="friendslist">
        </div>
        <div class="chat">
          <!--<div class="top group">
            <div class="chaticon"><img src="0.png"></div>
            <div class="groupnameandimage">
              <div class="groupname">Project Team-Up</div>
              <div class="groupimage"><img src="0.png"><img src="0.png"></div>
            </div>
          </div>-->
          <div class="messages" id="messageboard" onscroll="checkToLoadMoreMessges()">
            
          </div>
            <div class="textarea" id="inputTextDiv">
              <div class="textarea" id="inputText" contenteditable></div>
              <a href="#">
                <div class="send" id="sendbutton" onclick="send()"><p>Send</p></div>
              </a>
            </div>
            <script>
            var chatListUpdateTimeout;
            var messageUpdateTimeout;

            var otherId = 1;
            var isGroupChat = 0;
            function setOtherId(id, groupchat){
              otherId = id;
              isGroupChat = groupchat;
              loadMessages(true);
              clearTimeout(chatListUpdateTimeout);
              clearTimeout(messageUpdateTimeout);
              loadNewMessages();
              loadChatList();
            }

              function send(){
                var content = document.getElementById("inputText").innerHTML;
                if (content.length != 0) {
                  $.post("sendMessage.php", {id: otherId, isgroupchat: isGroupChat, content: content, contenttype: "text"}, function(data){
                    $("#inputText").html("");
                    $("#messageboard").html($("#messageboard").html() + data);
                    document.getElementById("messageboard").scrollTop = document.getElementById("messageboard").scrollHeight;
                  });
                }
              }

              var blockLoadMore = false;
              window.onload = loadMessages(true);
              function loadMessages(newload){
                if (newload) {
                  var sendData = "id=" + otherId + "&isgroupchat=" + isGroupChat + "&loadnew=" + "true";
                  document.getElementById("messageboard").innerHTML = "";
                }
                else{
                  var sendData = "id=" + otherId + "&isgroupchat=" + isGroupChat;
                }
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText != "") {
                      var oldScrollHeight = document.getElementById("messageboard").scrollHeight;
                      var oldScrollTop = document.getElementById("messageboard").scrollTop;

                      document.getElementById("messageboard").innerHTML = this.responseText + document.getElementById("messageboard").innerHTML;
                      
                      if (newload) {
                        document.getElementById("messageboard").scrollTop = document.getElementById("messageboard").scrollHeight;
                        

                      }
                      else{
                        document.getElementById("messageboard").scrollTop = document.getElementById("messageboard").scrollHeight - (oldScrollHeight - oldScrollTop);
                      }
                    }
                  }
                };
                if (newload) {blockLoadMore = true;}
                xmlhttp.open("GET", "loadMessages.php?" + sendData, true);
                xmlhttp.send(sendData);
              }
              
              function checkToLoadMoreMessges(){
                if (document.getElementById("messageboard").scrollTop < 200 && document.getElementById("messageboard").scrollHeight > 100 && !blockLoadMore) {
                  loadMessages(false);
                }
                if (blockLoadMore == true) {blockLoadMore=false;}
              };
              loadNewMessages();
              function loadNewMessages(){
                var sendData = "id=" + otherId + "&isgroupchat=" + isGroupChat;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("messageboard").innerHTML = document.getElementById("messageboard").innerHTML + this.responseText;
                    if (this.responseText != "") {
                      document.getElementById("messageboard").scrollTop = document.getElementById("messageboard").scrollHeight;
                    }
                    
                  }
                };
                xmlhttp.open("GET", "loadNewMessages.php?" + sendData, true);
                xmlhttp.send(sendData);
                messageUpdateTimeout = setTimeout(loadNewMessages, 1000);
              }

              var chatListLoadAmount = 12;
              window.load = loadChatList();
              function loadChatList(){
                var sendData = "limit=" + chatListLoadAmount;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    if (document.getElementById("friendslist").innerHTML != this.responseText) {}
                    document.getElementById("friendslist").innerHTML = this.responseText;
                  }
                };
                xmlhttp.open("GET", "loadChatList.php?" + sendData, true);
                xmlhttp.send(sendData);
                chatListUpdateTimeout = setTimeout(loadChatList, 2000);
              }
            </script>
        </div>
    </body>
</html>
