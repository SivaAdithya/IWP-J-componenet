<?php
error_reporting(E_ALL ^ E_DEPRECATED ^ E_WARNING);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
  header("location: videos_articles.php", TRUE, 302);
  die();
}

$username = $password = "";
$username_err = $password_err = $login_err = "";


$link = mysqli_connect("localhost", "root", "", "jbdataabase");

if(empty(trim($_POST["username"]))){
  $username_err = "Please enter username.";
} else{
  $username = trim($_POST["username"]);
}

if(empty(trim($_POST["password"]))){
  $password_err = "Please enter your password.";
} else{
  $password = trim($_POST["password"]);
}

if(empty($username_err) && empty($password_err)){
  $sql = "SELECT id, username, password FROM users WHERE username = ?";
  if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      $param_username = $username;
      if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1){
              mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
              if(mysqli_stmt_fetch($stmt)){
                  if(password_verify($password, $hashed_password)){
                      session_start();
                      $_SESSION["loggedin"] = true;
                      $_SESSION["id"] = $id;
                      $_SESSION["username"] = $username;
                      header("location: videos_articles.php");
                  } else{
                      $login_err = "Invalid username or password.";
                  }
              }
          } else{
              $login_err = "Invalid username or password.";
          }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
      mysqli_stmt_close($stmt);
  }
}
mysqli_close($link);
?>


<html>
  <title>Login</title>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
  background-color: rgb(113, 13, 163);
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #1707ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 48px 0 12px 0;
}

img.avatar {
  width: 50%;
  border-radius: 70%;
}
a {
  color: rgb(36, 56, 112);
}
.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
}
</style>
</head>
<body>
<form method="POST">
  <div class="imgcontainer">
    <img src="WhatsApp Image 2022-03-18 at 4.34.58 PM.jpeg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
    <button type="submit" onclick="validate()">Login</button>
  </div>
  
  <div class="container">
  <p id='p1'><b>Don't have an account? <a href="register.php">Sign up now</a>.</b></p>
  </div>
</form>


</body>
</html>