
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
       .header{
         display:flex;
         justify-content:center;
         height:90vh;
         align-items:center;
       }
       .from-control{
       
        text-align:center;
        width:40%;
        background:gray;
        margin-top:120px;
        padding:10px 0px;
       }
       .btn-primary{
         color:#000;
        font-size:20px;
         padding: 5px 20px;
        }
        .btn{
         color:#000;
         background: #E55473;
         padding: 5px 30px;  
         border:none;
         margin-left:50px;
         font-size:20px;
         border-radius:5px;
        }
        </style>
<body>
    <center>
        <div class="header">
        <form action="loginadmin_server_page.php" method="POST" class="from-control">
                
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