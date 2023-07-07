
<?php

$host='localhost';
$user='root';
$password=' ';
$db='user';

$data= new mysqli($host,$user,$password,$db);
if($data===false){
  die("connection error");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  .center{
    text-align: center;
   margin:0 auto;
   background-color:grey;
   width:400px;
   height:300px

  }
  .text{
    margin:50px;
  }
  .login{
    text-align: center;
    font-size:35px;
  }
</style>
<body>
     <h2 class='login'>Login page</h2>
       <br><br>
<div class="center">
   
  <form action="#" method="POST">
<div>
    <label>Username:</label><br>
    <input type="text" name="username" required></input>
</div>
<br>
<div>
    <label>password:</label><br>
    <input type="pass" name="password" required></input>
</div>
<br>
<div>
    <input type="submit" value="login">
</div>

</form>
</div>

</div>
</body>
</html>