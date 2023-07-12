
<?php

$host="localhost";
$user="root";
$password="";
$db="library_managment";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false){
  die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

   $username=$_POST["username"];
   $password=$_POST["password"];

   $sql="select * from login where username= '" .$username."' AND password='".$password."'
   ";
   $result=mysqli_query($data,$sql);
   $row=mysqli_fetch_array($result);

   
   if($row["usertype"]=="admin"){
    echo "Login successful";
   }
   else if($row["usertype"]=="user"){
    echo "Login successful";
   }
   else{
    echo " username or password incorrect";
   }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body{
                background-image: url('images/library.jpg');
                background-repeat: no-repeat;
                height:100%;
                background-position: center;
                background-size: cover;

        }
        input[type="text"]{
         width:300px;
         padding:5px 0px;
         margin-top:10px;
        }
        input[type="password"]{
                width:300px;   
                padding:5px 0px;
              
        }
        .btn-primary{
         color:#fff;
        font-size:20px;
         padding: 5px 20px;
        }
        .btn{
         color:#fff;
         background: #E55473;
         padding: 5px 30px;  
         border:none;
         margin-left:50px;
        }
        h1{
         margin-top:140px;
         margin-left:50px;
         color:red;
        }
        </style>
<body>
    <center>
        <div class="header">
       

        
         
        <form action="loginadmin_server_page.php" method="POST">
                
  <div>
        <h1>Login page</h1><br>
        <label class="btn-primary">username</label>
        <input type="text" name="username" required> 
</div>
<br><br>
<div>
        <label class="btn-primary">password</label>
        <input type="password" name="password" required> 
</div>
<br><br>
<div>
      
        <input type="submit"  class="btn"value="login" required> 
</div>
<form>
</div>
</center>
</body>
</html>