<?php
require_once 'php_action/db_connect.php';

$nameErr = $error = $sql = $errorUsername = "";
$first_name = $last_name = $username = $email = $user_password = $data = $stmt = $profile_pic = $status = "";

function test_input($data)
  {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

/*input validation part*/

if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
  $first_name = test_input($_POST['first_name']);
  $last_name = test_input($_POST['last_name']);
  $username = test_input($_POST['user_name']);
  $email = test_input($_POST['email']);
  $password = test_input($_POST['user_password']);
  $phone_number = test_input($_POST['contact_no']);
  $status = test_input($_POST['status']);
  /*username validation*/
  if (empty($first_name))
    {
    $error = true;
    $errorUsername = 'Please input first name';
    /*echo $errorUsername;*/
    }

  /*else((!preg_match("/^[a-zA-Z ]*$/", $first_name)))
  {
  $error = true;
  $nameErr = "Only letters and white space are allowed in first name";
  echo $nameErr;
  }*/
  if (empty($last_name))
    {
    $error = true;
    $errorUsername = 'Please input last name';
    echo $errorUsername;
    }

  /*else((!preg_match("/^[a-zA-Z ]*$/", $last_name)))
  {
  $error = true;
  $nameErr = "Only letters and white space are allowed in last name";
  echo $nameErr;
  }*/
  if (empty($phone_number))
    {
    $error = true;
    $errorUsername = 'Please input phone number';
    echo $errorUsername;
    }
    if (empty($status))
    {
    $error = true;
    $errorUsername = 'Please enter status';
    }

  /*
  else(!preg_match("/^[\d{10}]$/", $phone_number))
  {
  $error=true;
  $nameErr = "Only digits allowed";
  echo $nameErr;
  }*/
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
        echo '
        <div>
        <b>User already exists!!;</b>
        </div>
        ';
        /*header("signup.php");*/
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
        echo "Email already exists!!";
        exit;
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

    /*elseif($_POST['password'] == $_POST['confirm_password'])
    {
    $error= true;
    echo "Passwords do not Match!";
    }

    */
    /*--uploading image--*/

    // turn on php error reporting

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
      $name = $_FILES['file']['name'];
      $tmpName = $_FILES['file']['tmp_name'];
      $error = $_FILES['file']['error'];
      $size = $_FILES['file']['size'];
      $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
      switch ($error)
        {
      case UPLOAD_ERR_OK:
        $valid = true;

        // validate file extensions

        if (!in_array($ext, array(
          'jpg',
          'jpeg',
          'png',
          'gif'
        )))
          {
          $valid = false;
          $response = 'Invalid file extension.';
          }

        // validate file size

        if ($size / 1024 / 1024 > 2)
          {
          $valid = false;
          $response = 'File size is exceeding maximum allowed size.';
          }

        // upload file

        if ($valid)
          {
          $targetPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $name;
          move_uploaded_file($tmpName, $targetPath);
          $profile_pic = $targetPath;
          /*header( 'Location: signup.php' ) ;
          exit;*/
          }

        break;

      case UPLOAD_ERR_INI_SIZE:
        $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
        echo $response;
        break;

      case UPLOAD_ERR_FORM_SIZE:
        $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
        echo $response;

        break;

      case UPLOAD_ERR_PARTIAL:
        $response = 'The uploaded file was only partially uploaded.';
        echo $response;

        break;

      case UPLOAD_ERR_NO_FILE:
        $response = 'No file was uploaded.';
        echo $response;
        break;

      case UPLOAD_ERR_NO_TMP_DIR:
        $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
        echo $response;
        break;

      case UPLOAD_ERR_CANT_WRITE:
        $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
        echo $response;
        break;

      case UPLOAD_ERR_EXTENSION:
        $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
        echo $response;
        break;

      default:
        $response = 'Unknown error';
        echo $response;
        break;
        }
      
    

    /*upload part ends*/

    // insert into database
    // encrypt password with md5

    $password = md5($password);

    // insert data if no error

    if (!$error)
      {
        $stmt="INSERT INTO `user`(`username`, `email` ,`password` ,`first_name`, `last_name`,`phone_number`,`profile_pic`,`status`) VALUES ('".$username."','".$email."','".$password."','".$first_name."','".$last_name."','".$phone_number."','".$profile_pic."','".$status."')";


      /*
      $stmt = $connect->prepare("INSERT INTO user(username, email ,password ,first_name, last_name,phone_number,profile_pic,status) VALUES ($username,$email,$password,$first_name,$last_name,$phone_number,$profile_pic,$status)");*/

     /* $stmt->bind_param("sssssiss", $username, $email, $password, $first_name, $last_name, $phone_number, $profile_pic,$status);*/
     /* if ($stmt->execute())
        {
        $successMsg = 'Registered successfully. <a href="index.php">click here to login</a>';
        $stmt->close();
        #header('Location:index.php');
        }
        */
        if(mysqli_query($connect,$stmt))
        {
          echo 'New record created successfully.
          <a href="index.php">click here to login</a>';
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
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" pattern="[A-Za-z]+" title="letters only" maxlength="255" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" pattern="[A-Za-z]+" title="letters only" maxlength="255" class="form-control"  type="text" required>
    </div>
  </div>
</div>
  
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
        <input name="email" placeholder="E-Mail Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="255" title=" enter email in this format:xyz@something.com" class="form-control"  type="text">
    </div>
    </div>
</div>
<!--Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        <input name="contact_no" pattern="^\d{10}$" title="enter  10 digits" placeholder="(123)" maxlength="10"class="form-control" type="text">
    </div>
    </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="255" placeholder="Password" class="form-control" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" maxlength="255" id="pass1"  required>
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

<div class="form-group">
  <label class="col-md-4 control-label" >Set status</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="status" placeholder="What's your status?" minlength="2" maxlength="255" title="enter status" class="form-control"  type="text" maxlength="255" required>
  <!--<span class="glyphicons glyphicons-calendar"></span>-->
  <span id="confirmMessage" class="confirmMessage"></span>
    </div>
    </div>
</div>

<!--profile picture part-->

<div class="form-group">
  <label class="col-md-4 control-label" >Upload a profile picture</label> 
  <div>
  <div class="container">
     
      <div class="row">
        <?php 
          //scan "uploads" folder and display them accordingly
         $folder = "uploads";
         $results = scandir('uploads');
         foreach ($results as $result) 
         {
          if ($result === '.' or $result === '..') continue;
         
          if (is_file($folder . '/' . $result))
           {
            echo '
            <div class="col-md-3">
              <div class="thumbnail">
                <img src="'.$folder . '/' . $result.'" alt="...">
                  <div class="caption">
                  <p><a href="remove.php?name='.$result.'" class="btn btn-danger btn-xs" role="button">Remove</a></p>
                </div>
              </div>
            </div>';
          }
           unset($result);
          }  
                
        ?>
      </div>
         
      <div class="row">
          <div class="col-lg-12">
            <!-- <form class="well" action="upload.php" method="post" enctype="multipart/form-data">
          <form class="well" action="upload.php" method="post" enctype="multipart/form-data">-->
          <div class="form-group">
            <label for="file">Select a file to upload</label>
            <input type="file" name="file" accept="image/*">
            <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
          </div>
          <input type="submit" class="btn btn-lg btn-primary" value="Upload">
          <!--</form>-->
          </div>
      </div>
  </div> <!-- /container -->

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