<?php
session_start();
?>
<html>
<head>
  <title>Login page</title>
  <meta charset="utf-8">
</head>
<body>
<?php
  //Gọi file connection.php ở bài trước
  require_once("inc/conn.php");
  // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
  if (isset($_POST["btn_submit"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password =="") {
      echo "Your username or password cannot be left blank!";
    }else{
      $sql = "SELECT * from customer where UsernameC ='$username' and Password = '$password'";
      $query = mysqli_query($conn,$sql);
      $num_rows = mysqli_num_rows($query);
      if ($num_rows==0) {
        echo "Username or password is incorrect!";
      }else{
        //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
        $_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
      }
    }
  }
?>
 <!DOCTYPE html>
 <html>
 <head>
<link rel="icon" href="https://img.icons8.com/fluent/96/000000/data-configuration.png"/>
 	<link rel="stylesheet" type="text/css" href="admin.css">
 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 	<title>Login form</title>
 </head>
 <body>
 <div class="container">
  <h2 style="text-align: center; font-size: 30px">Welcome to login form </h2>
  <form class="was-validated" method="POST" action="login.php">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary" name="btn_submit">Login</button>
  </form>
  <h6 style="text-align: center;"><a href="../signup.php">Do not have an account?</a></h6>
</div>
 </body>
 </html>
