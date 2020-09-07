<?php
include "dbconn.php";
$case = mysqli_real_escape_string($con,$_POST['case']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);

switch($case){
  case "LOGIN":
    if ($email != "" && $password != ""){

    $sql_query = "select count(*) as data from user where email='".$email."' and password='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['data'];

    if($count > 0){
     //   $_SESSION['uname'] = $uname;
        echo true;
    }else{
        echo false;
        }
    }  
    break;

    case "REGISTER":
  // receive all input values from the form
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $password = mysqli_real_escape_string($con, $_POST['password']);
          $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
          $files=mysqli_real_escape_string($con,$_FILES['image']);
          die($files);
$tmp_name=$files['tmp_name'];
$name=$files['name'];
$destination=$name;
$res=move_uploaded_file($tmp_name, $destination);
          $errors = array();

          $user_check_query = "SELECT count(*) as data  FROM user WHERE mobile='".$mobile."' OR email='".$email."' LIMIT 1";
          $result = mysqli_query($con, $user_check_query);
          $row = mysqli_fetch_array($result);
            $count = $row['data'];
            if($count > 0){
             //   $_SESSION['uname'] = $uname;
                echo false;
            }else{
            $query = "INSERT INTO user(name, email, password,mobile,image) 
                      VALUES('$username', '$email', '$password','$mobile','$files')";
            mysqli_query($con, $query);
            echo true;
          }
    break;
    default:
    echo "Something Went Wrong";
}
