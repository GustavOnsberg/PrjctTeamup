<?php
	include('php_includes/header.php');

	$id = $_GET['id'];
	$stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $name = $row['name'];
        $ownerid = $row['ownerid'];
        $ownertype = $row['ownertype'];
    }
    else{
        header("Location: profileNotFound.php");
        exit();
    }
    if ($ownertype == 1){
	    $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
	    $stmt->bind_param("s", $ownerid);
	    $stmt->execute();

	    $result = $stmt->get_result();
	    $row = $result->fetch_assoc();
	    if ($result->num_rows > 0) {
	        $ownerfirstname = $row['firstname'];
	        $ownerlastname = $row['lastname'];
	    }
	    $ownerlink = 'profile.php?id=' . $ownerid;
	    $ownername = $ownerfirstname . " " . $ownerlastname;
	}
	else if($ownertype == 2){
		$stmt = $conn->prepare("SELECT * FROM groups WHERE id=?");
	    $stmt->bind_param("s", $ownerid);
	    $stmt->execute();

	    $result = $stmt->get_result();
	    $row = $result->fetch_assoc();
	    if ($result->num_rows > 0) {
	        $ownername = $row['name'];
	    }
	    $ownerlink = 'group.php?id=' . $ownerid;
	}


?>
<html lang="en">
	<head>
      <title>Project Team-Up | <?php echo($name); ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
		<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: 'Source Sans Pro', sans-serif;
			font-weight: 300;
			width: 100%;
			margin: auto;
			background-color: #ecf0f1;
		}
		div.cover{
			height: 40vh;
			background-color: #3498db;
			position:relative;
			background: url(cover.png) center no-repeat;
			background-size: cover;
		}
		div.profilesection{
			width: 85vw;
			margin: auto;
		}
		div.profilesection > .profileboard{
			width: 67%; /*100-3%-15%-15%=*/
			float: left;
			margin-left: 28vw;
			margin-top: 1%;
		}
		.profileboard > .profileboardmenu{
			height: 10vh;
			margin-bottom: 2.5%;
		}
		.profileboard > .profileboardmenu button{
			color: #000;
			text-decoration: none;
			float: left;
			width: calc(20% - 2px);
			text-align: center;
			line-height: 10vh;
			font-size: 90%;
			border: 1px solid rgba(0,0,0,0);
		}

		/*Test of tabmenu*/
		/* Style the tab */
		div.tab {
		    overflow: hidden;
		    font-weight: 300;
		}

		/* Style the buttons inside the tab */
		div.tab button {
		    background-color: inherit;
		    float: left;
		    border: none;
		    outline: none;
		    cursor: pointer;
		    transition: 0.3s;
		}

		/* Change background color of buttons on hover */
		div.tab button:hover {
		    background-color: #ddd;
		}

		/* Create an active/current tablink class */
		div.tab button.active {
		    background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
		    display: none;
		}
		.tabcontent {
		    -webkit-animation: fadeEffect 1s;
		    animation: fadeEffect 1s; /* Fading effect takes 1 second */
		}

		@-webkit-keyframes fadeEffect {
		    from {opacity: 0;}
		    to {opacity: 1;}
		}

		@keyframes fadeEffect {
		    from {opacity: 0;}
		    to {opacity: 1;}
		}
		#about > p{
			padding: 0;
			margin: 0;
		}
		#about > .aboutinfo{
			font-weight: 400;
		}




		.profileboard > .profileboardmenu div.current{
			color: #2ecc71;
		}
		.profileboard > .profileboardmenu div:hover{
			border: 1px solid #2ecc71;
		}
		.profileboard > div.companybox{
			margin-top: 2%;
			width: 100%;
			height: 50%;
			-webkit-box-shadow: -1px 1px 7px 7px rgba(0,0,0,0.5);
			-moz-box-shadow: -1px 1px 7px 7px rgba(0,0,0,0.5);
			box-shadow: -1px 1px 7px 7px rgba(0,0,0,0.5);
		}
		.profileboard > div.companybox > div.companyheader{
			background-color: #3498db;
			line-height: 30vh;
			text-align: center;
		}
		div.profilebox{
			position: fixed;
			float: left;
			top: 20vh;
			background-color: #ecf0f1;
			width: 25vw;
			-webkit-box-shadow: -1px 1px 7px 7px rgba(0,0,0,0.5);
			-moz-box-shadow: -1px 1px 7px 7px rgba(0,0,0,0.5);
			box-shadow: -1px 1px 7px 7px rgba(0,0,0,0.5);
		}
		div.profilebox > .logo {
			position: relative;
			height: 25vw;
			background-color: #3498db;
			background: url(ikon.png) center no-repeat;
			background-size: cover;
		}
		div.profilebox > .logo .followbox{
			position: absolute;
			bottom: 5%;
			left: 5%;
			width: 90%;
		}
		div.profilebox > .logo > .followbox > .follow{
			padding: 2% 10% 2% 10%;
			background-color: #ecf0f1;
			border-radius: 1em;
			float: left;
			margin-right: 2%;
		}
		div.profilebox > div.profileboxinfo{
			padding: 2.5%;
		}
		div.profilebox > .profileboxinfo > p{
			margin: 0;
			padding: 0;
		}
		div.profilebox > .profileboxinfo > p.role{
			font-size: 1.3em;
		}
		div.profilebox > .profileboxinfo > p > a{
			text-decoration: none;
			color: #0070c9;
		}
		div.profilebox > .profileboxinfo > p > a:hover{
			text-decoration: underline;
		}
		div.profilebox > .profileboxinfo > p.about{
			font-weight: 400;
			margin-top: 3%;
		}
		div.profilebox > .profileboxinfo > p.abouttext{
			margin-bottom: 3%;
		}
		div.profilebox > .profileboxinfo div.followcount{
			display: block;
			width: 50%;
		}
		div.profilebox > .profileboxinfo div.followcount span.left{
			text-align: left;
		}
		div.profilebox > .profileboxinfo div.followcount span.right{
			float: right;
			font-weight: 400;
		}
		.gradientback{
		    position:absolute;
		    bottom:0px;
		    left:0px;
		    width:100%;
		    height:25%;
		    padding-top: 1%;
		    background: -moz-linear-gradient(top,  rgba(137,255,241,0) 0%, rgba(0,0,0,0.75) 100%); /* FF3.6+ */
		    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(137,255,241,0)), color-stop(100%,rgba(0,0,0,0.75))); /* Chrome,Safari4+ */
		    background: -webkit-linear-gradient(top,  rgba(137,255,241,0) 0%,rgba(0,0,0,0.75) 100%); /* Chrome10+,Safari5.1+ */
		    background: -o-linear-gradient(top,  rgba(137,255,241,0) 0%,rgba(0,0,0,0.75) 100%); /* Opera 11.10+ */
		    background: -ms-linear-gradient(top,  rgba(137,255,241,0) 0%,rgba(0,0,0,0.75) 100%); /* IE10+ */
		    background: linear-gradient(to bottom,  rgba(137,255,241,0) 0%,rgba(0,0,0,0.75) 100%); /* W3C */
		    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0089fff1', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
		}
		.covernamebox{
			margin-left: 35.5vw;
			line-height: 1em;
			color: #ecf0f1;
		}
		.covernamebox p{
			margin: 0;
			padding: 0;
		}
		.covernamebox > p.header{
			font-size: 2em;
			line-height: 1.2em;
			display: block;
		}
		.covernamebox > p.location{
			display: block;
		}
		div.blogpost{
			overflow: hidden;
			margin-top: 5%;
			margin-bottom: 5%;
		}
		.blogpostdate{
			width: calc(6vw - 2px);
			height: calc(6vw - 2px);
			border: 1px solid #2ecc71;
			float: left;
		}
		.blogpostdate > p{
			margin: 0;
			padding: 0;
			text-align: center;
		}
		.blogpostdate > p.date{
			font-size: 3vw;
		}
		.blogpostdate > p.month{
			font-size: 1.5vw;
		}
		.blogposttitle{
			float: left;
			padding-left: 2%;
			display: inline-block;
			width: calc(100% - 2% - 6vw); /* 100% minus padding-left minus blogpostdate*/
		}
		.blogposttitle > p{
			margin: 0;
			padding: 0;
		}
		.blogposttitle > p.title{
			line-height: 3.5vw;
			font-size: 2.5vw;
		}
		.blogposttitle > p.auther{
			line-height: 2.5vw;
			font-size: 1.5vw;
		}
		.blogpostcontent {
			float: left;
			text-align: left;
			padding-top: 1%;
		}
		.versionpost{
			overflow: hidden;
		}
		.versionpost > .versionpostline{
			margin-top: calc(3.8% - 1px);
			height: 1px;
			background-color: #2ecc71;
			width: 25%;
			float: left;
		}
		.versionpost > .versionposttextbox{
			float: left;
			width: 50%;
			height: 8%;
		}
		.versionpost > .versionposttextbox > p{
			margin: 0;
			padding: 0;
			color: #2ecc71;
			text-align: center;
		}
		.versionpost > .versionposttextbox > p.versiondescription{
			color: #000;
		}
		.versionpost > .versionposttextbox > p.versionname{
			font-size: 1.5em;
		}
		.videopost{
			position: relative;
			border: 1px solid #2ecc71;
			min-height: 50%;
			margin-bottom: 5%;
			padding: 5%;
		}
		.videopost iframe{
			width: 100%;
		}
		.videopost > .videoposttextbox{
			position: absolute;
			top: -7%;
			left: 25%;
			width: 50%;
			min-height: 8vh;
			background-color: #ecf0f1;
		}
		.videopost > .videoposttextbox > p{
			margin: 0;
			padding: 0;
			color: #2ecc71;
			text-align: center;
		}
		.videopost > .videoposttextbox > p.videopostdescription{
			color: #000;
		}
		.videopost > .videoposttextbox > p.videopostname{
			font-size: 1.5em;
		}
		.postsomethingbox{
			width: 95%;
			padding: 2.5%;
			background-color: #fff;
		}
		.postsomethingbox > .write > textarea{
			font-size: 2em;
			border: 0;
			margin-bottom: 1%;
			width: 100%;
			resize: none;
		}
		.postsomethingbox > .write > textarea:focus {
		    outline:none;
		    height: 50%;
		}
		div.mobile{
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			background-color: #ecf0f1;
			display: none;
			z-index: 11000;
		}
		div.mobile > p.header{
			font-weight: 400;
		}
		div.mobile > p{
			text-align: center;
			margin: 0;
			padding: 0;
		}
		@media screen and (max-width: 320px) {
		}
		@media screen and (max-width: 480px) {
		}
		@media screen and (max-width: 850px) {
			.profilesection, .cover{
				display: none;
			}
			div.mobile{
			display: block;
			}	
			div.mobile > p.header{
			font-size: 16.66vw;
			}
		}
		@media screen and (max-width: 1028px) {
		}
		</style>
	</head>
	<body>
      <?php
        include("_header.php");
        ?>
		<div class="mobile">
			<p class="header">Sorry!</p>
			<p>We are working on a mobile and tablet version.</p>
			<p>In the mean time please support us by donating.</p>
		</div>
		<div class="cover">
			<div class="gradientback">
				<div class="covernamebox">
					<p class="header"><?php echo($name); ?></p>
					<p class="location">Copenhagen, Denmark</p>
				</div>
			</div>
		</div>
		<div class="profilesection">
			<div class="profilebox">
				<div class="logo">
					<div class="followbox">
						<div class="follow">Follow</div>
					</div>
				</div>
				<div class="profileboxinfo">
					<p class="role"><?php echo($name); ?></p>
					<p>By <a href="<?php echo($ownerlink); ?>"><?php echo($ownername); ?></a></p>
					<p class="about">About</p>
					<p class="abouttext">text</p>
					<div class="followcount">
						<span class="left">Followers</span><span class="right">#</span>
					</div>
				</div>
			</div>
			<div class="profileboard">
				<div class="profileboardmenu tab">
					<button class="tablinks" onclick="openTab(event, 'Front-page')" id="defaultOpen">Front-page</button>
					<button class="tablinks" onclick="openTab(event, 'About')">About</button>
					<button class="tablinks" onclick="openTab(event, 'Media')">Media</button>
					<button class="tablinks" onclick="openTab(event, 'Blog')">Blog</button>
					<button class="tablinks" onclick="openTab(event, 'Settings')">Settings</button>
				</div>
				<div id="Front-page" class="tabcontent">
				<div class="postsomethingbox">
					<div class="write"><textarea placeholder="Write something.."></textarea></div>
					<div>Milestone   Photo/Video   Check In <span style="float:right;">Post</span></div>
				</div>
					<div class="blogpost">
						<div class="blogpostdate"><p class="date">12.</p><p class="month">May</p></div>
						<div class="blogposttitle">
							<p class="title">Random Update v. 2.0</p>
							<p class="auther">Jacob Møller</p>
						</div>
						<div class="blogpostcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					</div>
					<div class="versionpost">
						<div class="versionpostline"></div>
						<div class="versionposttextbox">
							<p class="versiondescription">Project Group have now released</p>
							<p class="versionname">Project Team-Up 2.0</p>
						</div>
						<div class="versionpostline"></div>
					</div>
					<div class="blogpost">
						<div class="blogpostdate"><p class="date">4.</p><p class="month">May</p></div>
						<div class="blogposttitle">
							<p class="title">Random Update v. 1.044</p>
							<p class="auther">Jacob Møller</p>
						</div>
						<div class="blogpostcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					</div>

					<!--Video-->
					<div class="videopost">
						<div class="videoposttextbox">
							<p class="videopostdescription">Project Group have now released</p>
							<p class="videopostname">Project Team-Up Trailer</p>
						</div>
						<iframe src="https://www.youtube.com/embed/uNVJQCGxqb0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div id="About" class="tabcontent">
					<p class="aboutinfo">About #projectname</p>
					<p>hej</p>
					<p class="aboutinfo">Social media</p>
					<p>facebook.com/yamamma</p>
				</div>
				<div id="Media" class="tabcontent">
					media
				</div>
				<div id="Blog" class="tabcontent">
					Search by newest first/trending
					<div class="blogpost">
						<div class="blogpostdate"><p class="date">12.</p><p class="month">May</p></div>
						<div class="blogposttitle">
							<p class="title">Random Update v. 2.0</p>
							<p class="auther">Jacob Møller</p>
						</div>
						<div class="blogpostcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					</div>
					<div class="blogpost">
						<div class="blogpostdate"><p class="date">4.</p><p class="month">May</p></div>
						<div class="blogposttitle">
							<p class="title">Random Update v. 1.044</p>
							<p class="auther">Jacob Møller</p>
						</div>
						<div class="blogpostcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					</div>
				</div>
				<div id="Settings" class="tabcontent">
					settings
				</div>
			</div>
		</div>
		<script type="text/javascript">
		function openTab(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
		</script>
	</body>
</html>