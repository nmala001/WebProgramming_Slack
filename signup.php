<?php
require_once 'php_action/db_connect.php';

$nameErr = $error = $sql = $errorUsername = "";
$username = $email = $user_password = $data = $stmt = "";

function test_input($data)
  {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

/*input validation part*/

if ($_POST)
  {
      $username = test_input($_POST['user_name']);
      $email = test_input($_POST['email']);
      $password = test_input($_POST['user_password']);
  /*username validation*/
  
      if (empty($username))
      {
          $error = true;
          $errorUsername = 'Please input username';
          echo $errorUsername;
      }
      else
      {
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username))
            {
              $error = true;
              $nameErr = "Only letters and white space allowed";
              echo $nameErr;
            }
            else
            {
                $sql = "SELECT username FROM user WHERE username = '$username'";
                $res = $connect->query($sql);
                if ($res->num_rows == 1)
                  {
                      echo '<script language="javascript">';
                      echo 'alert("Username already exists,Choose a different username!!")';
                      echo '</script>';
                      $error=true;
                      exit;
                  }
            }
      }
    /*userc email validation*/
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
          $error = true;
          $errorEmail = 'Please enter valid input email';
          echo $errorEmail;
    }
    else
    {
      $sql = "SELECT email FROM user WHERE email = '$email'";
      $res = $connect->query($sql);
      if ($res->num_rows == 1)
        {
          echo '<script language="javascript">';
          echo 'alert("User Email already exists,Enter a different E-mail!!")';
          echo '</script>';
          $error = true;
          $errorEmail = 'Please enter different email';
          echo $errorEmail;
        }
    }

    /*password validation*/
    if (empty($password))
    {
      $error = true;
      $errorPassword = 'Please enter password';
      echo "Please enter password";
    }
    elseif (strlen($password) < 6)
    {
      $error = true;
      $errorPassword = 'Password must be at least 6 characters';
      echo "Password must be at least 6 characters";
    }
    // insert into database
    // encrypt password with md5
    $password = md5($password);
    // insert data if no error
    if (!$error)
      {
        $stmt="INSERT INTO `user`(`username`, `email` ,`password`) VALUES ('".$username."','".$email."','".$password."')";

        if(mysqli_query($connect,$stmt))
        {
            echo '<script language="javascript">';
            echo 'alert("User registered successfully!!")';
            echo '</script>';
            echo '<a href="index.php">click here to login</a>';
        }
        else
        {
          echo "Error: " . $stmt . "<br>" . mysqli_error($connect);
        }
      }
    }
?>

<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<script src="signup.js"></script>-->
<script src="js/signup/validate.js"></script>

</head>
<body>

<div class="container">

<form class="well form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  id="contact_form" autocomplete="off" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="user_name" placeholder="Username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,12}$" title="username with letters or number from 6 to 12 chars" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!--Text input -->
<div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input name="email" placeholder="xyz@something.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="255" title="enter email in this format:xyz@something.com" class="form-control"  type="text">
    </div>
    </div>
</div>
<!--Text input-->


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="255" placeholder="Password" class="form-control" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" maxlength="255" id="pass1"  required>
    </div>
    </div>
</div> 

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="confirm_password" placeholder="Confirm Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  maxlength="255" title="Retype the password" class="form-control"  type="password" maxlength="255" onkeyup="checkPass(); return false;" id="pass2" required>
      <span id="confirmMessage" class="confirmMessage"></span>
    </div>
    </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div><!-- /.container -->
</body>
</html>

