<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Incident Register</title>
        <link rel="stylesheet" type="text/css" href="css/incident_reg_maker.css">
        <script src="java_script/incident_reg_maker.js"></script>
    </head>
        <body bgcolor="#E6E6FA">
        <?php session_start(); if(isset($_SESSION["username"])) {?>
            
        <div class="dropdown" >
        <button onclick="myFunction()" class="dropbtn"><?php  echo"Maker :- ".$_SESSION["username"]; ?> </button>
        <div id="myDropdown" class="dropdown-content">
        <a href="index.php">Home</a>
        <a href="maker_status_history.php">History</a>
        <a href="logout.php">Logout</a>
        </div>
        </div>
        <?php
        $error=$description=$category=$date=$time=$url="";
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $username=$_SESSION["username"];
            //echo $username;
            $error=$_POST["makererror"];
            //echo $error;
            $description=$_POST["makerdescription"];
            //echo  $description;;
            $category=$_POST["makercategory"];
            //echo $category;
            $date=$_POST["makerdate"];
            //echo $date;
            $time=$_POST["makertime"];
            //echo $time;
            $url=$_POST["makerurl"];
            //echo $url;
            $status="Under Process";
            
            $pk="hello";
            
            $user='root';
            $pass='';
            $database='test_db';
            $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
            
         
            $sql="INSERT INTO incident_reg(USERNAME, ERROR, CATEGORY, DESCRIPTION, DATE, TIME, URL, STATUS) VALUES ('".$username."', '".$error."', '".$category."', '".$description."', '".$date."', '".$time."', '".$url."', '".$status."')";
            
            $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            } 
            echo"<script>alert('DETAILS SAVED')</script>";
            echo"<script>window.location='#'</script>";
            
        }} //isset session bracket see on the top;
        else{
             echo"<script>window.location='index.php'</script>";
        }
         ?>
        <center>
            <h2><b>INCIDENT REGISTER</b></h2>
            <form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validate()">
            
        <table border="1px">
            
            <tr>
                <th width="100" height="25">Error</th>
                <td width="100" height="25"> <input type="text" size="39" name="makererror" required="" placeholder="Enter the error"></td>
             <tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="100" height="25"></td>
             </tr>
             <tr>
                <th width="100" height="25">Category</th>
                <td width="100" height="25">  <select name="makercategory" required="" style="width: 150px">
                                              <option>CATEGORY</option>
                                              <option>Facebook Status</option>
                                              <option>Upload Pic</option>
                                              <option>Transaction</option>
                                              <option>Bus Ticket</option>
                                              <option>Movie Ticket</option>
                                              <option>Online Shopping</option>
                                              </select>
               </td>
             <tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="100" height="25"></td>
             </tr>
                  <tr>
                <th width="100" height="25">Description</th>
                <td width="150" height="25"><textarea  rows="4" cols="40" name="makerdescription" required="" placeholder="Enter the description"></textarea></td>
             </tr>
                  <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
            <tr>
                <th width="100" height="25">Date</th>
                <td width="150" height="25"><input type="date" size="39" name="makerdate" required="" placeholder="Enter the date"></td>
             </tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
              <tr>
                <th width="100" height="25">Time</th>
                <td width="150" height="25"> <input type="time" size="39" name="makertime" required="" placeholder="Enter the time"></td>
             <tr>
                  <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
              <tr>
                <th width="100" height="25"> URL</th>
                <td width="150" height="25"><input type="text" size="39" name="makerurl" required="" placeholder="Enter the URL"></td>
             </tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
             <tr>
               
                 </table>
            <br>
              <input id="round" type="submit" value="Submit!" />
             
            </form>     
               
        </center>         
    </body>

</html>
