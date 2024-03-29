<!DOCTYPE html>
<?php
include("data_class.php");

?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
.container,
.row,
.imglogo {
    margin:auto;
}
.innerdiv{
    text-align:center;
    margin:100px;
}
.leftinnerdiv {
    float: left;
    width: 25%;
}
.rightinnerdiv {
    float: right;
    width: 75%;
}

.greenbtn {
    background-color:rgb(16,170,16);
    color: black;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}
form{
    margin-top:20px;
    width: 600px;
    text-align:center:
} 
input[type="text"]{
    margin-left:10px;
    width:50%;
    margin:10px 0px
}
input[type="number"]{
    margin-left:10px;
    width:50%;
    margin:10px 0px
}
input[type="password"]{
    margin-left:10px;
    width:50%;
    margin:10px 0px
}
input[type="email"]{
    margin-left:10px;
    width:50%;
    margin:10px 0px
}
.btn{
    background:red;
    color:#fff;
    padding:5px 20px;
    margin:0px 20px 0px 0px;
}
input[type="radio"]{
    margin:10px;
}
</style>
   <body>
   <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/logo.png"/></div>

            <div class="leftinnerdiv">
                <Button class="greenbtn"> ADMIN</Button>
                <br>
                <Button class="greenbtn" onclick="openpart('addbook')" ><img class="icons" src="images/icon/book.png" width="30px" height="30px"/>  ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')" > <img class="icons" src="images/icon/open-book.png" width="30px" height="30px"/> BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><img class="icons" src="images/icon/interview.png" width="30px" height="30px"/> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> <img class="icons" src="images/icon/add-user.png" width="30px" height="30px"/> ADD STUDENT</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> STUDENT REPORT</Button>
                <Button class="greenbtn"  onclick="openpart('issuebook')"> <img class="icons" src="images/icon/test.png" width="30px" height="30px"/> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"> <img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/book.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>

<!--Add person start -->
            
            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD Person</Button>
            
            
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:---</label><input type="text" name="addname"/>
            </br>
            <label>Password:</label><input type="password" name="addpass"/>
            </br>
            <label>Email:---</label><input  type="email" name="addemail"/></br>
            <label for="typw">Choose type:</label>
            <select name="type"  style="width:200px;">
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select>
            <input type="submit" class="btn" value="SUBMIT"/>
            </form>
            </div>
            </div>

<!--Add person end -->

<!--Add student record start -->
<div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Student RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table border='1' style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;style='padding:8px;'><tr>
          
                    <th> Name</th><th>Email</th><th>Type</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                 $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'> <button type='button' class='btn btn-success'>Delete</button></a></td>";
                $table.="</tr>";
                 $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>


            </div>
            </div>

     <!--Add student record end-->

       <!--Add book report start-->


       
       <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table border='1' style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th> <th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                 $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]' class='btn btn-primary' >Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>
           <!--Add book report end-->

         <!--Add student record end-->

<!--Add new book start -->
<div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >ADD NEW BOOK</Button>
            <br>
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <label>Book Name:</label><input type="text" name="bookname"/>
            </br>
            <label> Book Detail:</label><input  type="text" name="bookdetail"/></br>
            <label>Book Author:</label><input type="text" name="bookaudor"/></br>
            <label>Publication:-</label><input type="text" name="bookpub"/></br>
            <div><label>Branch:</label><input type="radio" name="branch" value="other"/>Other<input type="radio" name="branch" value="BSIT"/>BSIT<div style="margin-left:50px"><input type="radio" name="branch" value="BSCS"/>BSCS<input type="radio" name="branch" value="BSSE"/>BSSE</div>
            </div>   
            <label>Book Price:</label><input  type="number" name="bookprice"/></br>
            <label>Quantity:--</label><input type="number" name="bookquantity"/></br>
            <label>Book Photo</label><input  type="file" name="bookphoto"/></br>
            </br>
   
            <input type="submit" class="btn" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>
         <!--Add new book end -->

        <!--issue book start -->


        <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">

            <label for="book">Choose Book:-</label>
            <select style="width:300px;"name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>
<br>
            <label for="Select Student">Select Student:</label>
            <select  style="width:300px;" name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>
           <label style="margin-left:60px;">Days:</label> <input style="margin-left:10px;"type="number" name="days"/>
  <br>
            <input type="submit" style="margin-left:30px;" class="btn" value="SUBMIT"/>
            </form>
            </div>
            </div>
			
			
          <!--issue book end-->
<!-- issue book report start-->


<div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Issue Book Record</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table border='1' style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;' >Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

<!-- issue book report end-->
<!--book request approve start-->


<div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK REQUEST APPROVE</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table border='1' style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved book</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>
			

<!--book request approve end-->
          <!-- book detail start-->

          <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $bookimg?> "/>
            </br>
         <div class="book-details">
            <p style="color:red"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:black; margin-left:10px"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="margin-left:180px"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="margin-left:180px"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="margin-left:180px"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="margin-left:180px"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
        </div>

            </div>
            </div>

          <!-- book detail end-->



</div>
</div>
        

     
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
    </body>
</html>