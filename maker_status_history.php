<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Incidents History</title>
        <link rel="stylesheet" type="text/css" href="css/incident_reg_maker.css">
        <script src="java_script/incident_reg_maker.js"></script>
    </head>
    <body bgcolor="#E6E6FA">
        <?php session_start(); if(isset($_SESSION["username"])) { // if session active den only php page load ?>  
                                
        <div class="dropdown" >
        <button onclick="myFunction()" class="dropbtn"><?php  echo"Maker :- ".$_SESSION["username"]; ?> </button>
        <div id="myDropdown" class="dropdown-content">
        <a href="index.php">Home</a>
        <a href="status_history_maker.php">History</a>
        <a href="logout.php">Logout</a>
        </div>
        </div>                      
        <CENTER><h2> STATUS OF ERROR BY MAKER    </h2></CENTER>                        
        <?php 
        $user='root';
        $pass='';
        $database='test_db';
        $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
        //echo("Great work");
        $sql="Select * from incident_reg";
        $result=$conn->query($sql);
        $j=0;
        ?>
        <center>
            <table border="1px">
                <th width="60" height="25">S.NO </th>
                <th width="200" height="25">ERROR </th>
                <th width="100" height="25">CATEGORY </th>
                <th width="200" height="25">DESCRIPTION</th>
                <th width="50" height="25">URL</th>
                <th width="60" height="25">ER_Id </th>
                <th width="200" height="25">DATE</th>
                <th width="200" height="25">TIME</th>
                <th width="200" height="25">STATUS</th>
                <th width="200" height="25">UPDATE</th>
        <?php
         while($row=$result->fetch_assoc())
         {
             $username=$row["USERNAME"];
             $error=$row["ERROR"];
             $category=$row["CATEGORY"];
             $description=$row["DESCRIPTION"];
             $date=$row["DATE"];
             $time=$row["TIME"];
             $url=$row["URL"];
             $status=$row["STATUS"];
             $id=$row["PK"];
         if($username==$_SESSION["username"])
         {
             $j++;
         ?>
          <form  action="maker_status_update.php" method="post" >
             <tr>
             <td width="200" height="25"><center><?php echo$j; ?></center></td>   
             <td width="200" height="25"> <textarea  rows="4" cols="30" name="update_error" required="" ><?php echo$error; ?></textarea></td>
             <td width="50" height="25"> <input type="text" size="10" style="height: 58px" name="update_category" required="" value="<?php echo$category; ?>"</td>
             <td width="200" height="25"><textarea  rows="4" cols="40" name="update_description" required="" ><?php echo$description; ?></textarea></td>
             <td width="100" height="25"> <input type="text" size="15" style="height: 58px" name="update_url" required="" value="<?php echo$url; ?>"></td>
             <td width="200" height="25"><center><?php echo$id; ?></center></td>
             <td width="200" height="25"><center><?php echo$date; ?></center></td>
             <td width="200" height="25"> <center><?php echo$time; ?></center></td>
             <td width="200" height="25"><center><?php echo$status; ?></center></td>
             <td width="200" height="25"><center><input id="round" type="submit" value="update<?php echo$id ;?>" name="update_submit" /></center></td>
             </tr>
          </form>       
         <?php }}?>
          </table>
          </center>      
        <?php 
        }else{
             echo"<script>window.location='index.php'</script>";}
        ?>
    </body>
</html>
