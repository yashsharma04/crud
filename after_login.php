
<?php

	session_start() ;
	$_SESSION['logged_in']=1 ;

?>
<html>
	<head>
		<title>
			Form
		</title>
		   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

	</head>
	<body>
		<header>
			<div class ='head'>
        <form action="logout.php">
            <input class='sub' type="submit" value="LOGOUT">
        </form>			</div>
		</header>
		<div class='container'>

      <?php

       echo "WELCOME ".$_SESSION['first_name'];
			 echo " ".$_SESSION['last_name'];
			 echo "<br> ID = ";
			 echo $_SESSION['id'];
			 echo "<br> Email = ";
			 echo $_SESSION['email'];

			 ?>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
