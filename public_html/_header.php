<html>
  <head>
    <style>
      span.header{
			color:#fff;
		}
		span.bold{
			color:#fff;
		}
      	li a{
			color: #fff !important;
		}
      ul li ul li a{
			color: #000 !important;
		}
    </style>
  </head>
  <body>
<?php
if (isset($_SESSION['id'])) {
    include ('_navbar_user.php');
}
else {
    include ('_navbar_guest.php');
}

?>
</body>
</html>