<?php
session_start(); // Start the session

include('class/db.php');

$object = new db();

if ($object->is_login()) {
  header('location:index.php');
  exit(); // Exit to prevent further execution
}

$message = '';

if (isset($_POST["login_button"])) {
  $formdata = array();

  if (empty($_POST["user_email"])) {
    $message .= '<li>Email Address is required</li>';
  } else {
    if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
      $message .= '<li>Invalid Email Address</li>';
    } else {
      $formdata['user_email'] = trim($_POST["user_email"]);
    }
  }

  if (empty($_POST["user_password"])) {
    $message .= '<li>Password is required</li>';
  } else {
    $formdata['user_password'] = trim($_POST["user_password"]);
  }

  if ($message == '') {
    $data = array(
      ':user_email'       =>  $formdata['user_email']
    );

    $object->query = "
        SELECT * FROM user_msbs 
        WHERE user_email = :user_email 
        ";

    $object->execute($data);

    if ($object->row_count() > 0) {
      foreach ($object->statement_result() as $row) {
        if ($row["user_status"] == 'Enable') {
          if ($row["user_password"] == $formdata['user_password']) {
            $_SESSION['user_type'] = $row["user_type"];
            $_SESSION['user_id'] = $row["user_id"];
            header('location:index.php');
            exit(); // Exit to prevent further execution
          } else {
            $message = '<li>Wrong Password</li>';
          }
        } else {
          $message = '<li>Your Account has been disabled</li>';
        }
      }
    } else {
      $message = '<li>Wrong Email Address</li>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login </title>
  <link href="<?php echo $object->base_url; ?>css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

  <style type="text/css">
    /* POPPINS FONT */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: url("assets/img/bg1.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      overflow: hidden;
    }

    .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 110vh;
      background: rgba(39, 39, 39, 0.4);
    }

    .nav {
      position: fixed;
      top: 0;
      display: flex;
      justify-content: space-around;
      width: 100%;
      height: 100px;
      line-height: 100px;
      background: linear-gradient(rgba(39, 39, 39, 0.6), transparent);
      z-index: 100;
    }

    .nav-logo p {
      color: white;
      font-size: 25px;
      font-weight: 600;
    }

    .nav-menu ul {
      display: flex;
    }

    .nav-menu ul li {
      list-style-type: none;
    }

    .nav-menu ul li .link {
      text-decoration: none;
      font-weight: 500;
      color: #fff;
      padding-bottom: 15px;
      margin: 0 25px;
    }

    .link:hover,
    .active {
      border-bottom: 2px solid #fff;
    }

    .nav-button .btn {
      width: 130px;
      height: 40px;
      font-weight: 500;
      background: rgba(255, 255, 255, 0.4);
      border: none;
      border-radius: 30px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    #registerBtn {
      margin-left: 15px;
    }

    .btn.white-btn {
      background: rgba(255, 255, 255, 0.7);
    }

    .btn.btn.white-btn:hover {
      background: rgba(255, 255, 255, 0.5);
    }

    .nav-menu-btn {
      display: none;
    }

    .form-box {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 512px;
      height: 420px;
      overflow: hidden;
      z-index: 2;
    }

    .login-container {
      position: absolute;
      left: 4px;
      width: 500px;
      display: flex;
      flex-direction: column;
      transition: 0.5s ease-in-out;
    }

    .register-container {
      position: absolute;
      right: -520px;
      width: 500px;
      display: flex;
      flex-direction: column;
      transition: 0.5s ease-in-out;
    }

    .top span {
      color: #fff;
      font-size: small;
      padding: 10px 0;
      display: flex;
      justify-content: center;
    }

    .top span a {
      font-weight: 500;
      color: #fff;
      margin-left: 5px;
    }

    header {
      color: #fff;
      font-size: 30px;
      text-align: center;
      padding: 10px 0 30px 0;
    }

    .two-forms {
      display: flex;
      gap: 10px;
    }

    .input-field {
      font-size: 15px;
      background: rgba(255, 255, 255, 0.2);
      color: #0a0a0a;
      height: 50px;
      width: 100%;
      padding: 0 10px 0 45px;
      border: none;
      border-radius: 30px;
      outline: none;
      transition: 0.2s ease;
    }

    .input-field:hover,
    .input-field:focus {
      background: rgba(255, 255, 255, 0.25);
    }

    ::-webkit-input-placeholder {
      color: #fff;
    }

    .input-box i {
      position: relative;
      top: -35px;
      left: 17px;
      color: #fff;
    }

    .submit {
      font-size: 15px;
      font-weight: 500;
      color: black;
      height: 45px;
      width: 100%;
      border: none;
      border-radius: 30px;
      outline: none;
      background: rgba(255, 255, 255, 0.7);
      cursor: pointer;
      transition: 0.3s ease-in-out;
    }

    .submit:hover {
      background: rgba(255, 255, 255, 0.5);
      box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
    }

    .two-col {
      display: flex;
      justify-content: space-between;
      color: #fff;
      font-size: small;
      margin-top: 10px;
    }

    .two-col .one {
      display: flex;
      gap: 5px;
    }

    .two label a {
      text-decoration: none;
      color: #fff;
    }

    .two label a:hover {
      text-decoration: underline;
    }

    @media only screen and (max-width: 786px) {
      .nav-button {
        display: none;
      }

      .nav-menu.responsive {
        top: 100px;
      }

      .nav-menu {
        position: absolute;
        top: -800px;
        display: flex;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        width: 100%;
        height: 90vh;
        backdrop-filter: blur(20px);
        transition: 0.3s;
      }

      .nav-menu ul {
        flex-direction: column;
        text-align: center;
      }

      .nav-menu-btn {
        display: block;
      }

      .nav-menu-btn i {
        font-size: 25px;
        color: #fff;
        padding: 10px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        cursor: pointer;
        transition: 0.3s;
      }

      .nav-menu-btn i:hover {
        background: rgba(255, 255, 255, 0.15);
      }
    }

    @media only screen and (max-width: 540px) {
      .wrapper {
        min-height: 100vh;
      }

      .form-box {
        width: 100%;
        height: 500px;
      }

      .register-container,
      .login-container {
        width: 100%;
        padding: 0 20px;
      }

      .register-container .two-forms {
        flex-direction: column;
        gap: 0;
      }
    }
  </style>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body class="bg-primary">
  <div class="wrapper">
    <nav class="nav">

      <div class="nav-menu-btn">
        <i class="bx bx-menu" onclick="myMenuFunction()"></i>
      </div>
    </nav>

    <div class="form-box">
      <div class="login-container" id="login">
        <!-- Admin login form -->
        <div class="top">
          <header>Welcome Admin!</header>
        </div>
        <form method="post" action="">
          <div class="input-box">
            <input type="text" class="input-field" placeholder="Username or Email" name="user_email" />
            <i class="bx bx-user"></i>
          </div>
          <div class="input-box">
            <input type="password" class="input-field" placeholder="Password" name="user_password" />
            <i class="bx bx-lock-alt"></i>
          </div>
          <div class="input-box">
            <input type="submit" class="submit" value="Login" name="login_button" />
          </div>
          <div class="two-col">
            <div class="one">
              <input type="checkbox" id="login-check" />
              <label for="login-check"> Remember Me</label>
            </div>
            <div class="two">
              <label><a href="#">Forgot password?</a></label>
            </div>
          </div>
        </form>
      </div>



      <script>
        function myMenuFunction() {
          var i = document.getElementById("navMenu");

          if (i.className === "nav-menu") {
            i.className += " responsive";
          } else {
            i.className = "nav-menu";
          }
        }

        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
          x.style.left = "4px";
          y.style.right = "-520px";
          a.className += " white-btn";
          b.className = "btn";
          x.style.opacity = 1;
          y.style.opacity = 0;
        }

        function register() {
          x.style.left = "-510px";
          y.style.right = "5px";
          a.className = "btn";
          b.className += " white-btn";
          x.style.opacity = 0;
          y.style.opacity = 1;
        }
      </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="<?php echo $object->base_url; ?>js/scripts.js">
      </script>
</body>

</html>