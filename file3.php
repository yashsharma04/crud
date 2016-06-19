<html>
	<head>
		<title>
			Form
		</title>
		   <!-- Bootstrap core CSS -->
		<script>
			function validate() {
				var id = document.getElementById("search_id").value;
				var name = document.getElementById("search_firstname").value;
				var email =document.getElementById("search_email").value;
				if (id=="" && name=="" && email=="")
				{
						alert("Please Fill atleast one field ");
						return false ;
				}
				else
				{
					 document.getElementById("myform").submit();
						return true ;
				}
			}
		</script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class ='head'>
				<a href='login.php'>LOGIN</a>
				<a href='index.html'>REGISTER</a>
			</div>
		</header>
		<div class='container'>
		<form id='myform' role="form"  action="file4.php" method='get'>
			<div class="form-group">
    			<label for="search_id">Search by Id:</label>
    			<input type="text" required="" class="form-control" id="search_id" placeholder="Place your Id here " name='search_id'>
  		</div>
			<div class="form-group">
    			<label for="search_firstname">Search by First Name:</label>
    			<input type="text" class="form-control" id="search_firstname" placeholder="First Name " name='search_firstname'>
  		</div>
			<div class="form-group">
    			<label for="search_email">Search by Email Id :</label>
    			<input type="email" required="" class="form-control" id="search_email" placeholder=" Email " name='search_email'>
  		</div>
			<input type="button" class="btn btn-default" onclick='validate()' id='sub' value="Submit" />
		</form>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
