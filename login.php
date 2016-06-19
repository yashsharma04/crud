<?php
  session_start();
  if (isset($_SESSION['logged_in']))
  {
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
            <a href='login.php'>LOGIN</a>
            <a href='index.html'>REGISTER</a>
          </div>
        </header>
    <div class='container'>
      <form action="logout.php">
          <input class='sub' type="submit" value="Click Here To Logout">
      </form>
      <h3> You are Alredy Logged in </h3>

    </div>
  </body>
</html>
    <?php
  }
  else
  {
    $_SESSION['var'] = 0 ;

    function customError($errno, $errstr)
    {
      $_SESSION['var'] = 1 ;
    }
    set_error_handler("customError");

    $email = $_GET['email'];
    $var = $_SESSION['var'];
    if ($var==0)
    {
        $email = $_GET['email'];
        $pwd = $_GET['pwd'];
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password,'crud');

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //  echo "Connected successfully <br>";
        $after_md = md5($pwd);
        $sql = "select * from Information where password ='".$after_md."' and email ='".$email."' ;";
        $result = $conn->query($sql);

        if ($result->num_rows> 0)
        {
          $_SESSION['count']=1;
          while($row = $result->fetch_assoc())
          {
            $_SESSION['id']=$row['id'];
            $_SESSION['first_name']=$row['first_name'];
            $_SESSION['user_name']=$row['username'];
            $_SESSION['email']=$row['email'];
            $_SESSION['last_name']=$row['last_name'];
          }
          header("Location:after_login.php");
        }
        else
        {
          ?>
          <h6> Wrong credentials </h6>
          <?php
        }
    }
    else
    {
    ?>
    <html>
      <head>
        <title>
          Form
        </title>
           <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script>
           function update()
           {

           }
        </script>
      </head>
      <body>
        <header>
          <div class ='head'>
            <a href='login.php'>LOGIN</a>
            <a href='index.html'>REGISTER</a>
          </div>
        </header>
        <div class='container'>
        <form role="form"  action="login.php" method='get'>
          <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
              </div>
          <div class="form-group">
              <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
          </div>
          <input type ='hidden' value ='login' name ='hidden_type'>
            <button type="submit" class="btn btn-default"  >Submit</button>
        </form>
      </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
      </body>
    </html>
    <?php
  }
}
  ?>
