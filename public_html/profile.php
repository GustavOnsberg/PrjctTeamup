<?php
include('php_includes/header.php');
if (isset($_GET['id']) || isset($_SESSION['id'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else{
    	$id = $_SESSION['id'];
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $description = $row['description'];
        $profileimage = $row['profileimage'];
        $country = $row['country'];
        $city = $row['city'];
        $verified = $row['verified'];
        $job = $row['job'];
    }
    else{
        header("Location: profileNotFound.php");
    }



    if (isset($_GET['edit'])) {
		if ($_GET['edit'] == "true") {
			$edit = true;
		}
		else {
			$edit = false;
		}
	}
	else {
		$edit = false;
	}
}
else{
	header("Location: login.php");
	exit();
}





?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
      <title>Project Team-Up | <?php echo($firstname . " " . $lastname); ?></title>
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
		.profileboard > .profileboardmenu div.current{
			color: #2ecc71;
		}
		div.profilesection > .profileboard{
			width: 67%; /*100-3%-15%-15%=*/
			float: left;
			margin-left: 3vw;
			margin-top: 1%;
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
          .profileboard > div.projects{
          	width:96%;
            padding:2%;
            background-color:#fff;
          }
          .profileboard > div.projects > p{
          font-weight:400;
            font-size:1.5em;
            padding:0;
            margin:0;
          }
		div.profilebox{
			position: relative;
			float: left;
			top: -15vh;
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
		div.profilebox > .logo > .followbox .follow{
			border: 0;
			padding: 2% 10% 2% 10%;
			background-color: #ecf0f1;
			border-radius: 1em;
			float: left;
			margin-right: 2%;
			color: #000;
		}
		div.profilebox > .logo > .followbox .follow:hover{
			background-color: #dfdfdf;
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
		}
		.covernamebox{
			margin-left: 35.5vw;
			line-height: 1em;
			color: #ecf0f1;
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
			display: inline;
		}
        .covernamebox > p.header img{
        display:inline-block;
          float:left;
          }
		.covernamebox > p.location{
			display: block;
		}
		@media screen and (max-width: 320px) {
		}
		@media screen and (max-width: 480px) {
		}
		@media screen and (max-width: 768px) {
		}
		@media screen and (max-width: 1028px) {
		}
		</style>
		<?php
        include("php_includes/quill_base.php");
        ?>
        <link href="css/_personCard.css" rel="stylesheet">
	</head>
	<body>
      	<?php
        include("_header.php");
        ?>
		<div class="cover">
			<div class="gradientback">
				<div class="covernamebox">
					<p class="header"> <?php echo($firstname . " " . $lastname . "   @" . $username); ?></p>
                                        <?php
                                                if ($verified == 1) {
                                                    echo "<a href='verified.php' ><img src='verified_icon.png' style='width: 20px; margin: 12px; margin-bottom: 6;'></a>";
                                                }
                                        ?>
                                        
                    <?php
                    $locationSpacing = "";
                    if ($city != "" && $city != null && $country != "" && $country != null) {
                    	$locationSpacing = ", ";
                    }
                    ?>                    
					<p class="location"><?php echo ($city.$locationSpacing.$country); ?></p>
				</div>
			</div>
		</div>
		<div class="profilesection">
			<div class="profilebox">
				<div class="logo" style="background: url(<?php echo($profileimage); ?>) center no-repeat;">
					<div class="followbox">
						<a href="follow.php?id=<?php echo($id); ?>"><div class="follow">Follow</div></a>
						<a href="<?php echo("sendFriendRequest.php?id=".$id.""); ?>"><div class="follow">Add Friend</div></a>
					</div>
				</div>
				<div class="profileboxinfo">
					<p class="role"><?php echo($firstname . " " . $lastname); ?></p>
					<p><?php echo($job); ?></p>
					<div class="followcount">
						<span class="left">Followers</span><span class="right">#</span>
					</div>
					<div class="followcount">
						<span class="left">Following</span><span class="right">#</span>
					</div>
				</div>
			</div>
			<div class="profileboard">
              <div class="profileboardmenu tab">
					<button class="tablinks" onclick="openTab(event, 'Front-page')" <?php if(isset($_GET['tab'])){if($_GET['tab'] != "about" && $_GET['tab'] != "media" && $_GET['tab'] != "blog" && $_GET['tab'] != "friends"){ echo("id='defaultOpen'");}}else{echo("id='defaultOpen'");} ?>>Front-page</button>
					<button class="tablinks" onclick="openTab(event, 'About')" <?php if(isset($_GET['tab'])){if($_GET['tab'] == 'about'){ echo("id='defaultOpen'");}} ?>>About</button>
					<button class="tablinks" onclick="openTab(event, 'Media')" <?php if(isset($_GET['tab'])){if($_GET['tab'] == 'media'){ echo("id='defaultOpen'");}} ?>>Media</button>
					<button class="tablinks" onclick="openTab(event, 'Blog')" <?php if(isset($_GET['tab'])){if($_GET['tab'] == 'blog'){ echo("id='defaultOpen'");}} ?>>Blog</button>
					<button class="tablinks" onclick="openTab(event, 'Friends')" <?php if(isset($_GET['tab'])){if($_GET['tab'] == 'friends'){ echo("id='defaultOpen'");}} ?>>Friends</button>
				</div>
			<div id="Front-page" class="tabcontent">
	            <div class="projects">
	            	<p>Projects <?php echo($firstname);?> participate in</p>
	            </div>
			</div>
			<div id="About" class="tabcontent">
				<?php

			$text = $description;
			$saveAction = "saveDescription.php";
			$textId = $id;
			$editLink = "profile.php?edit=true&tab=about";
			$canEdit = false;
			if ($id == $_SESSION['id']) {
				$canEdit = true;
			}

			include("_document.php");
			?>
			</div>
			<div id="Media" class="tabcontent">
				media
			</div>
			<div id="Blog" class="tabcontent">
				blog
			</div>
			<div id="Friends" class="tabcontent">
				<?php
				include("_personCard.php");
				?>
			</div>
		</div>
	</div>
	
	<?php
    include("_footer.php");
    ?>
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