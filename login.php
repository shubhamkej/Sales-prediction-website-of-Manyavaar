<!DOCTYPE html>
<head>
  <title>Login</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;;
  cursor: pointer;
}

body {
  background: #76b852; /* fallback fo url('img/bg2.jpg')r old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  background-image:  url('img/bg2.jpg');
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
  </style>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="login.php">
      <label>Username</label>
      <input type="text" name="user"/>
      <label>Password</label>
      <input type="password" name="pwd"/>
      
      <button>login</button> 
      <?php
        session_start();
        if(isset($_POST['user'],$_POST['pwd']) && $_POST['user']!='')
        {
          $connection = mysqli_connect('localhost','root','','dbms_project');

          if(!$connection)
          {
            die("Connection failed: ".mysqli_connect_error());
          }
          else
          {
            $user=$_POST['user'];
            $pwd=$_POST['pwd'];
            $sql="SELECT * from company WHERE OWNER_OF_COMPANY='$user' AND Password='$pwd'";
            $result = $connection->query($sql);

            if($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              }
              $_SESSION['user']=$_POST['user'];
              $_SESSION['pwd']=$_POST['pwd'];
              echo "<script>window.open('index.php','_self')</script>"; 
            }   
            else 
            {
                echo  '<div class="alert alert-danger">
                        <p><strong>Alert!</strong></p>
                        Email or password wrong! Please try again!.
                    </div>';
            }
            $connection->close();  
          }
        }
      ?>
    </form>
  </div>
</div>
</body>