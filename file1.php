<?php
		session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";


	$conn = new mysqli($servername, $username, $password,"crud");


	if ($conn->connect_error)
	{
    	die("Connection failed: " . $conn->connect_error);
	}

	echo "Connected successfully ";
	echo "<br>";

	$first_name = $_GET['first_name'];
	$last_name = $_GET['last_name'];
	$user_name = $_GET['user_name'];
	$email = $_GET['email'];
	$pwd= md5($_GET['pwd']);
	echo "WELCOME ".$first_name ;
	echo "<br>";

	$_SESSION['first_name']=$first_name;
	$_SESSION['last_name']=$last_name;
	$_SESSION['user_name']=$user_name;
	$_SESSION['email']=$email;
	$_SESSION['pwd']=$pwd;

	$_SESSION['enc'];
	$create_table = "create table  if not exists Information (id int not null auto_increment primary key ,user_name varchar(20)  ,  first_name varchar(20) , last_name varchar (20), email varchar(20) , password varchar(30));";

	if (mysqli_query($conn,$create_table))
	{
			echo "successfully created ";
	}
	else
		echo "unsuccesful <br>";

	$insert1 = "insert into Information  (user_name , first_name , last_name , email , password ) values ( '".$user_name."' ,'".$first_name."' , '".$last_name."' , '".$email."'  , '".$pwd."' );" ;

	if (mysqli_query($conn, $insert1))
		echo "successfully inserted ";
	else
		echo "unsuccessfull <br>" ;


	header('Location:file2.html');

?>
