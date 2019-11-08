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

	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg2.jpg">
		<div class="container h-100">
			<div class="hero-content text-white">
				<div class="row">
					<div class="col-lg-6 pr-0">
						<h2>SAATH SAATH HAMESHA</h2>
						<p> Kuch khatti, kuch meethi, kuch pyaari baatein </p>
					</div>
				</div>
				<div class="hero-rocket">
					<img alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->
<br><br>
	<!-- About section -->
	<section class="about-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 about-text">
					<h2>Add Data</h2><br>
						<form action="customer.php" method="post">
						Enter Details of Customer: <br>
						<div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Customer ID" name="ID">
                    <?php
                        if(isset($_POST["ID"])){
                            $fname = $_POST["ID"];
                            if(strlen($fname) == 0){
                                echo "<p style=\"color:red\">Please enter Customer ID</p>";
                            }
                            else{
                            	$a=1;
                            }
                        }
                    ?>
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Name of Customer" name="name">
                    <?php
                        if(isset($_POST["name"])){
                            $lname = $_POST["name"];
                            if(strlen($lname) == 0){
                                echo "<p style=\"color:red\">Please enter name</p>";
                            }
                            else{
                            	$a=$a+1;
                            }
                        }
                    ?>
                </div>                
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Enter email" name="email">
                    <?php
                        if(isset($_POST["email"])){
                            $email = $_POST["email"];
                            if(strlen($email)==0){
                                echo "<p style=\"color:red\">Please enter your email address</p>";
                            }
                            elseif(!preg_match('/^[a-z0-9!#$%&*+?^_`{|}~-]+(?=.*[a-z0-9!#$%&*+?^_`{|}~-])+@(?=.*[a-z0-9]?\.)+(?=.*[a-z0-9])?.{8,}$/', $pwd1)){
                                echo "<p style=\"color:red\">Please enter valid email address</p>";
                            }
                            else{
                            	$a=$a+1;
                            }
                        }
                    ?>
                </div>
                
					<div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Contact Number" name="contact">
                    <?php
                        if(isset($_POST["contact"])){
                            $contact = $_POST["contact"];
                            if(strlen($contact) == 0){
                                echo "<p style=\"color:red\">Please enter contact number</p>";
                            }
                            elseif(!preg_match('/^[0-9]+(?=.*[0-9])?.{10}$/', $pwd1)){
                                echo "<p style=\"color:red\">Please enter valid contact number</p>";
                            }
                            else{
                            	$a=$a+1;
                            } 
                        }
                    ?>
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Bought Clothes ID" name="cID">
                    <?php
                        if(isset($_POST["cID"])){
                            $cID = $_POST["cID"];
                            if(strlen($cID) == 0){
                                echo "<p style=\"color:red\">Please enter clothes ID</p>";
                            }
                            else{
                            	$a=$a+1;
                            }                            
                        }
                    ?>
                </div>
						<button type="submit">Submit</button>
				</div>
				<div class="col-lg-6">
					<img src="./img/incussa.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- About section end -->
	<?php
	if(isset($_POST['ID']))
        {
          $connection = mysqli_connect('localhost','root','','dbms_project');

          if(!$connection)
          {
            die("Connection failed: ".mysqli_connect_error());
          }
          else
          {
          		$id=$_POST["ID"];
           		$name=$_POST["name"];
				$email=$_POST["email"];
				$contact=$_POST["contact"];
				$cID=$_POST["cID"];

           		$sql = "INSERT INTO dbms_project.customer (Customer_ID, Name, Phone_Number, Email, B_Serial_ID) VALUES ( '$id', '$name', '$contact', '$email', '$cID')" ;
           		if ($a==5) {
           	
           		if (mysqli_query($connection, $sql)) {
   					 echo "New record created successfully";
				} else {
    				echo "Error: " . $sql . "<br>" . $connection->error;
				}
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
