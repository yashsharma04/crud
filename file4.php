<html>
<head>
  <title >
  </title >
  <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body >
<?php
// Start the session
  session_start();

  $id = $_GET['search_id'];
  $name= $_GET['search_firstname'];
  $email = $_GET['search_email'];

    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password,'crud');

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully <br>";
?>
  <div class="container">

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>UserName</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>


<?php



  if ($id !="" and $name!="" and $email!="")
  {
    $sql = "select * from Information where id ".$id." and first_name LIKE %'".$name."%' "." and email LIKE %'".$email."%' ;";
    $result = $conn->query($sql);
    if ($result->num_rows> 0)
    {
      while($row = $result->fetch_assoc())
      {

        echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";


      }
    }
    else
    {
      echo "0 results";
    }
  }
  else if ($id !="")
  {
    if ($name !='' )
    {
      $sql = "select * from Information where id=".$id." and first_name LIKE %'".$name."%' ;";
      $result = $conn->query($sql);
      if ($result->num_rows> 0)
      {
        while($row = $result->fetch_assoc())
        {

                  echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";        }
      }
      else
      {
        echo "0 results";
      }
    }
    else if ($email!='')
    {
      $sql = "select * from Information where id=".$id." and email LIKE %'".$email."%' ;";
      $result = $conn->query($sql);
      if ($result->num_rows> 0)
      {
        while($row = $result->fetch_assoc())
        {

                  echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";        }
      }
      else
      {
        echo "0 results";
      }
    }
    else
    {

      $sql = "select * from Information where id=".$id." ;";
      $result = $conn->query($sql);
      if ($result->num_rows> 0)
      {
        while($row = $result->fetch_assoc())
        {

                  echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";        }
      }
      else
      {
        echo "0 results";
      }
    }
  }
  else if ($id=='')
  {
    if ($name !='' and $email!='')
    {
      $sql = "select * from Information where email LIKE %'".$email."'% and first_name LIKE %'".$name."%' ;";
      $result = $conn->query($sql);
      if ($result->num_rows> 0)
      {
        while($row = $result->fetch_assoc())
        {

                  echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";        }
      }
      else
      {
        echo "0 results";
      }
    }
    else if ( $name=='' )
    {
      $sql = "select * from Information where  email LIKE %'".$email."%' ;";
      $result = $conn->query($sql);
      if ($result->num_rows> 0)
      {
        while($row = $result->fetch_assoc())
        {

                  echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";
        }
      }
      else
      {
        echo "0 results";
      }
    }
    else
    {

        $sql = "select * from Information where first_name LIKE '%".$name."%';";
        $result = $conn->query($sql);
        if ($result->num_rows> 0)
        {
          while($row = $result->fetch_assoc())
          {

                    echo "<tr> <td>".$row['id']."</td> <td>".$row['first_name']."</td> <td>".$row['user_name']."</td> <td>".$row['email']."</td>";
          }
        }
        else
        {
          echo "0 results";
        }
    }
  }
  echo " </tbody> </table> </div>";
  ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    </body> </html>
<?php
    $conn->close();
?>
