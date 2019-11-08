<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
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
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

<!-- Header section -->
	<header class="header-section">
		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>
		<div class="nav-warp">
			<div class="user-panel">
				<a href="welcome.php">Logout</a> /
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
			<h2>Predictions</h2>
		</div>
	</section>
	<!-- Page Top section end -->
	<?php
	if(isset($_POST['name']) && isset($_POST['predbased']) )
        {
          $connection = mysqli_connect('localhost','root','','dbms_project');

          if(!$connection)
          {
            die("Connection failed: ".mysqli_connect_error());
          }
          else
          {
          		$name=$_POST["name"];
          		$pred=$_POST["predbased"];
          		 // SQL query
          		 if( $pred == "Month" )
          		 {
				$strSQL = "SELECT sales.Batch_Number, (AVG(sales.Monthly_Sales)*1.0314) as Monthly_Sales, sales.Time, city.Name_of_City FROM sales INNER JOIN city WHERE sales.City_Pincode=city.Pincode AND city.Name_of_City='$name' GROUP BY sales.TIME;";
				}
				else
				 {
				$strSQL = "SELECT sales.Batch_Number, (AVG(sales.Monthly_Sales)*1.0314) as Monthly_Sales, sales.Time, city.Name_of_City FROM sales INNER JOIN city WHERE sales.City_Pincode=city.Pincode AND city.Name_of_City='$name' GROUP BY sales.Batch_Number;";
				}
				
				// Execute the query (the recordset $rs contains the result)
				$rs = mysqli_query($connection,$strSQL);


				  print "
					  <div class='container-fluid'>
					    <table class='table-striped' width='100%' style='text-align:center;font-size:20px;margin:10px;'>
						 <tr>
					  <td style='padding:10px;' width=100>Batch Code</td>
					  <td width=100>Monthly Sales</td> 
					    <td width=100>Month</td>
					   <td width=100>Name of City</td> 
					  </tr>"; 
					 while($row = mysqli_fetch_array($rs))
					 { 
					print "<tr>"; 
					print "<td style='padding:10px;'>" . $row['Batch_Number'] . "</td>";
					print "<td>" . $row['Monthly_Sales'] . "</td>";
					print "<td>" . $row['Time'] . "</td>";
					$r=strtoupper($row['Name_of_City']);
					print "<td style='padding:10px;'>" . $r . "</td>"; 

					print "</tr>"; 
					} 
					print "</table></div>"; 

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
									<li><a href="./index.php">About Us</a></li>
									<li><a href="./contact.php">Contact Us</a></li>
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
