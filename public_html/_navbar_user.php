<!DOCTYPE html>
<head lang="en">	
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title>Menu</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style type="text/css">
          div.noti{
            display:block;
            background-color:red;
            border-radius:50%;
            height:1em;
            width:1em;
            margin-top:1.5em;
          }
		body{
			margin: 0;
			padding: 0;
			font-family: 'Source Sans Pro', sans-serif;
			font-weight: 300;
			height: 150vh;
		}
		header.menubar{
			width: 85vw;
			padding-left:7.5vw;
          padding-right:7.5vw;
			line-height: 4em;
          	z-index:100;
          position:fixed;
          left:0;
					transition: all 0.5s;
					-moz-transition: all 0.5s; /* Firefox 4 */
					-webkit-transition: all 0.5s; /* Safari and Chrome */
					-o-transition:all 0.5s;  /* Opera */
		}
		.menudefault{
			color:#ecf0f1;
			border-bottom: 1px solid rbga(0,0,0,0);
		}
		.menuwhite{
			background-color:#ecf0f1;
			color:#000 !important;
			border-bottom: 1px solid black;
		}
		span.header{
			float: left;
			font-size: 2em;
			color: inherit;
		}
		span.bold{
			font-weight: 400;
			color: inherit;
		}
		ul{
			margin: 0;
			padding: 0;
			float: right;
			list-style-type: none;
			text-align: right;
		}
		li{
          display:block;
			float: left;
			list-style-type:none;
			margin-left: 2vw;
		}
		li a{
			color: inherit !important;
			text-decoration: none;
		}
		li a:hover{
			color: #0070c9;
			text-decoration: underline;
		}
		li.profile{
			position: relative;
		}
		li.profile > a:hover{
			color: #0070c9;
			text-decoration: underline;
		}
		li a img{
			padding-top: 1em;
			height: 2em;
		}
		li ul{
			display: none;
			position: absolute;
          	top:3em;
			padding: 2vh;
			background-color: #ecf0f1;
			min-width: 15vh;
			color:#000;
		}
		li ul li{
          	float:none;
         	text-align:left;
			line-height: 1em;
			margin-left: 0;

		}
		li:hover ul{
			display: block;
		}
		@media screen and (max-width: 320px) {
		}
		@media screen and (max-width: 480px) {
			body{
				width: 98vw;
			}
			span.header{
				font-size: 1em;
			}
          	header.menubar{
			width: 95vw;
			padding-left:2.5vw;
          	padding-right:2.5vw;
			}
		}
		@media screen and (max-width: 768px) {
			span.header{
				font-size: 1.2em;
			}
          	header.menubar{
			width: 98%;
              padding-left:1%;
              padding-right:1%;
            }
		}
		@media screen and (max-width: 1028px) {
		}



		.notificationsPanel{
			overflow: hidden;
		}
		.notificationsPanel:hover{
			overflow: visible;
		}
		</style>
	</head>
	<body>
		<header class="menubar menudefault">
			<span class="header"><span class="bold">Project</span> Team-Up</span>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Explore</a></li>
				<li class="profile"><a href="createProject.php">Create</a>
					<ul>
						<li><a href="createProject.php">Project</a></li>
						<li><a href="createGroup.php">Group/Organization</a></li>
					</ul>
				</li>
				<li class="profile"><a href="profile.php">
					<?php

			        echo "";
			        if (isset($_SESSION['id'])) {
			            echo $_SESSION['username'];
			        }
                  ?></a>
				<!--<img src="profilikon.png"></a>-->
					<ul>
                      	<li><a href="profile.php">Profile</a></li>
                      	<li><a href="chat.php">Chat</a></li>
                     	<!--<li><a href="#">Groups</a></li>
                      	<li><a href="#">Projects</a></li>-->
						<li><a href="userSettings.php">Settings</a></li>
						<li><a href="logoffAction.php">Logout</a></li>
					</ul>
				</li>
					<li>
                      <div class="notificationsPanel" style="position:relative;background-color: red; width: 30px; height:30px; margin-top:calc(2em - 15px); border-radius: 20px;">
						<a href="#" style="position:absolute;top:0;left:0;padding:0;line-height:1em;color: white; text-decoration: none;top: 50%;left: 50%;transform: translate(-50%, -50%);">3</a>
					  </div>
                      <!--<div style="background-color:#333; margin-top:2%;">hej</div>-->
              </li>
			</ul>


			


		</header>
		<script type="text/javascript">
			$(document).on("scroll",function(){
				if($(document).scrollTop()>1){
					$("header").removeClass("menudefault").addClass("menuwhite");
				} else{
					$("header").removeClass("menuwhite").addClass("menudefault");
				}
			});
		</script>
	</body>
