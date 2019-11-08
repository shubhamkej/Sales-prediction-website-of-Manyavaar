<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manyavar Sales Prediction</title>
  <meta charset="UTF-8">
  <meta name="description" content="Cloud 83 - hosting template ">
  <meta name="keywords" content="cloud, hosting, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon"/>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/flaticon.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="css/animate.css"/>
  <link rel="stylesheet" href="css/style.css"/>


  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!-- Header section -->
  <header class="header-section">
    <div class="nav-switch">
      <i class="fa fa-bars"></i>
    </div>
    <div class="nav-warp">
      <div class="user-panel">
        <a href="welcome.php">Logout</a> 
      </div>
      <ul class="main-menu">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./about.php">Insert</a></li>
        <li><a href="./service.php">Update</a></li>
        <li><a href="./blog.php">Predict</a></li>
        <li><a href="./contact.php">Contact</a></li>
      </ul>
    </div>
  </header>
  <!-- Header section end -->

  <!-- Page Top section -->
  <section class="page-top-section set-bg" data-setbg="img/top-bg.jpg">
    <div class="container">
      <h2>Update Wedding Collection</h2>
    </div>
  </section>
  <!-- Page Top section end -->

<?php
  // Connect to database server
   $con=mysqli_connect("localhost", "root", "") or die (mysqli_error ());

   // Select database
   mysqli_select_db($con,"dbms_project") or die(mysqli_error());

 // SQL query
$strSQL = "SELECT * FROM wedding";

// Execute the query (the recordset $rs contains the result)
$rs = mysqli_query($con,$strSQL);


  print "
  <div class='container-fluid'>
    <table class='table-striped' width='100%' style='text-align:center;font-size:20px;margin:10px;'>
   <tr>
   <td style='padding:10px;' width=100>Serial Number</td> 
  <td width=100>Indian Wear Price</td>
  <td width=100>Indo-Western Wear Price</td> 
  <td width=100>Western Wear Price</td> 
  </tr>"; 
 while($row = mysqli_fetch_array($rs))
 { 
print "<tr>"; 
print "<td style='padding:10px;'>" . $row['Serial_Wedding_Number'] . "</td>"; 
print "<td>" . $row['Indian_Price'] . "</td>";
print "<td>" . $row['Indo_Western_Price'] . "</td>"; 
print "<td>" . $row['Western'] . "</td>";  
print "</tr>"; 
} 
print "</table></div>"; 

  ?>
<br>
  <!-- About section -->
  <section class="about-section spad pt-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 about-text">
          <h2>Update Data</h2><br>
            <form action="upwedding.php" method="post">
            Enter Details of  Wedding Dress: <br>
            <br><input type = "text" name = "id" placeholder="Serial Number"><br><br>
            <br><input type = "text" name = "iprice" placeholder="Indian Dress Price"><br><br>
            <br><input type = "text" name = "iwprice" placeholder="Indo-Western Dress Price"><br><br>
            <br><input type = "text" name = "wprice" placeholder="Western Dress Price"><br><br>
            <button type="submit">Submit</button>
        </div>
        <div class="col-lg-6">
          <img src="./img/inwed.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- About section end -->
    <?php
    if(isset($_POST['id']))
          {
            $connection = mysqli_connect('localhost','root','','dbms_project');

            if(!$connection)
            {
              die("Connection failed: ".mysqli_connect_error());
            }
            else
            {
                $id=$_POST["id"];
                $iprice=$_POST["iprice"];
                $iwprice=$_POST["iwprice"];
                $wprice=$_POST["wprice"];

                if( $iwprice == '0' && $wprice == '0')
                {
                      $sql = "UPDATE dbms_project.wedding SET Indian_price='$iprice' WHERE Serial_Wedding_Number='$id'" ;
                      if (mysqli_query($connection, $sql2) && mysqli_query($connection, $sql))
                          echo "Record updated successfully";
                } 
                else if( $iprice == '0' && $wprice == '0')
                {
                      $sql = "UPDATE dbms_project.wedding SET Indo_Western_price='$iwprice' WHERE Serial_Wedding_Number='$id'" ;
                      if (mysqli_query($connection, $sql2) && mysqli_query($connection, $sql)) 
                     echo "Record updated successfully";
                } 
                else
                {
                      $sql = "UPDATE dbms_project.wedding SET Western='$wprice' WHERE Serial_Wedding_Number='$id'" ;
                      if (mysqli_query($connection, $sql2) && mysqli_query($connection, $sql)) 
                     echo "Record updated successfully";
                }
              $connection->close();  
            }
          }

    ?>


  <!-- Footer top section -->
  <section class="footer-top-section text-white spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-widget about-widget">
            <img src="./img/logo2.png" alt="logo">
            <p>Follow us on:</p>
            <div class="fw-social social">
              <a href="#"><i class="fa fa-pinterest"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-behance"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="footer-widget">
            <h4 class="fw-title">Usefull Links</h4>
            <div class="row">
              <div class="col-sm-6">
                <ul>
                  <li><a href="https://www.manyavar.com/">Manyavar</a></li>
                  <li><a href="https://www.manyavar.com/">Mohey</a></li>
                  <li><a href="">About Us</a></li>
                  <li><a href="\contact.php">Contact Us</a></li>
                  <li><a href="">Dedicated Hosting</a></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul>
                  <li><a href="">Terms of Use</a></li>
                  <li><a href="">Privacy Policy</a></li>
                  <li><a href="">Returns and Exchanges</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer top section end -->

  
  <!--====== Javascripts & Jquery ======-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>