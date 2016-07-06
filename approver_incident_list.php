<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Approver List</title>
        <link rel="stylesheet" type="text/css" href="css/approver_1.css">
        <script src="java_script/approver_1.js"></script>
    </head>
    <body bgcolor="#E6E6FA">
        <?php session_start(); if(isset($_SESSION["username"])){ ?>
        <div class="dropdown" >
        <button onclick="myFunction()" class="dropbtn"><?php  echo"Approver :- ".$_SESSION["username"]; ?> </button>
        <div id="myDropdown" class="dropdown-content">
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
        <a href="#">Contact Us</a>
        </div>
        </div>
        <?php
            $user='root';
            $pass='';
            $database='test_db';
            $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
            $sql="select * from incident_login where role='maker'";
            $result=$conn->query($sql);
        ?>
            <center>
            <h1>SELECT THE OPTIONS BELOW</h1>
            <br><br><br>
            <div class="styled-select">
            <form name="myform" action="approver_incident_status.php" method="post" onsubmit="return validate()">
            <select name="list_username">
            <option>USERNAME</option>
            <option>ALL</option>
        <?php
            while($row=$result->fetch_assoc()){
        ?>
            <option> <?php echo$row["USERNAME"]?> </option>   
        <?php } ?>
         </select>
             </div>
            <br><br>  
            <div class="styled-select">
            <select name="list_category" required="">
            <option>CATEGORY</option>
            <option>ALL</option>
            <option>Facebook Status</option>
            <option>Upload Pic</option>
            <option>Transaction</option>
            <option>Bus Ticket</option>
            <option>Movie Ticket</option>
            <option>Online Shopping</option>
        </select>
            </div>    
        <br><br>  
        <div class="styled-select">
           <select name="list_status">
              <option>STATUS</option>
              <option>ALL</option>
              <option>PROCESSED</option>
              <option>UNDER PROCESS</option>
           </select>
        </div>    
        <br><br>
        <input id="submitbutton" type="submit" value="Submit">
        </form>
        <center>
             
        <?php
        }else{
            echo"<script>window.location='index.php'</script>";
        }
        ?>
    </body>
</html>
