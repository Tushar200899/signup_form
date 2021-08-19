<?php 
  include('connection.php');
  if(isset($_POST['token']) && password_verify("signuptoken", $_POST['token']))
  {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone_no = $_POST['phone_no'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($name != "" && $username != "" && $phone_no != "" && $gender != "" && $password != "" )
    {
     $query = $db->prepare('INSERT INTO users(name,username,phone_no,gender,password) VALUES(?,?,?,?,?)');
     $data = array($name,$username,$phone_no,$gender,password_hash($password, PASSWORD_DEFAULT));
     $execute = $query->execute($data);
     if($execute)
     {
          echo"data inserted Successfully";
     }
     else
     {
          echo"  something went wrong";
     }
    }
    else
    {
        echo"server error";
    }
  }
?>