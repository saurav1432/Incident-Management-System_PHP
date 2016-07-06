
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
        <?php session_start(); if(isset($_SESSION["username"])) { // if session active den only php page load 
        $username=$_SESSION["username"];
        $username_maker=$_POST["list_username"];
        $cat_maker=$_POST["list_category"];
        $status_maker=$_POST["list_status"];
            
        ?>  
                                
        <div class="dropdown" >
        <button onclick="myFunction()" class="dropbtn"><?php  echo"Maker :- ".$_SESSION["username"]; ?> </button>
        <div id="myDropdown" class="dropdown-content">
        <a href="index.php">Home</a>
        <a href="status_history_maker.php">History</a>
        <a href="logout.php">Logout</a>
        </div>
        </div>    
        <?php
        $i=0;
        $user='root';
        $pass='';
        $database='test_db';
        $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");   
        $sql="";
        // UNDER PROCESSED INCIDENTS 
        if($status_maker==("UNDER PROCESS"))
           {
                if($username_maker=="ALL" && $cat_maker=="ALL")
                {
                    $sql="select * from incident_reg where STATUS='Under Process' ";
                }
                else if($username_maker==("ALL") && ($cat_maker!=("ALL")))
                {
                    $sql="select * from incident_reg where  CATEGORY='".$cat_maker."' AND STATUS='Under Process' ";
                }
                    else if(username_maker!=("ALL") && cat_maker==("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND STATUS='Under Process' ";
                }
                else if($username_maker!=("ALL") && $cat_maker!=("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND CATEGORY='".$cat_maker."' AND STATUS='Under Process' ";
                }
                $result=$conn->query($sql);
        ?>
        <CENTER><h2> UNDER PROCESS INCIDENTS OF MAKERS    </h2></CENTER>
                <center>
                <table border="1px">
                <th width="80" height="25">S.NO</th>  
                <th width="200" height="25">ERROR </th>
                <th width="150" height="25">CATEGORY </th>
                <th width="130" height="25">USERNAME</th>
                <th width="350" height="25">DESCRIPTION</th>
                <th width="100" height="25">URL</th>
                <th width="50" height="25">DATE</th>
                <th width="50" height="25">TIME</th>
                <th width="150" height="25">STATUS</th>
                <th width="100" height="25">UPDATE</th>        
        <?php
        while($row=$result->fetch_assoc()){
            $i++;
                $id=$row["PK"];
                $error=$row["ERROR"];
                $category=$row["CATEGORY"];
                $description=$row["DESCRIPTION"];
                $date=$row["DATE"];
                $time=$row["TIME"];
                $url=$row["URL"];
       ?>
        <form  action="approver_status_db_save.php" method="post" >
                <tr>
                <td width="10" height="25"><center><?php echo$i; ?></center></td> 
                <td width="100" height="25"><?php echo$error; ?></td>
                <td width="100" height="25"><?php echo$category; ?></td>
                <td width="100" height="25"><center><?php echo$username; ?></center></td>
                <td width="150" height="25"><?php echo$description; ?></td>
                <td width="150" height="25"><center><?php echo$url; ?></center></td>
                <td width="150" height="25"><center><?php echo$date; ?></center></td>
                <td width="150" height="25"> <center><?php echo$time; ?></center></td>
                <td width="100" height="25"> <center><?php echo"Under Process"; ?></center></td>
                <td><center><input id="round" type="submit" value="update<?php echo$id; ?>" name="update_submit"/></center></td>
                </tr>
        </form>
        <?php } ?>
        </table>
        </center>
        <?php 
        }
         else if($status_maker==("PROCESSED"))
           {
                if($username_maker=="ALL" && $cat_maker=="ALL")
                {
                    $sql="select * from incident_reg where STATUS='Processed' ";
                }
                else if($username_maker==("ALL") && ($cat_maker!=("ALL")))
                {
                    $sql="select * from incident_reg where  CATEGORY='".$cat_maker."' AND STATUS='Processed' ";
                }
                    else if(username_maker!=("ALL") && cat_maker==("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND STATUS='Processed' ";
                }
                else if($username_maker!=("ALL") && $cat_maker!=("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND CATEGORY='".$cat_maker."' AND STATUS='Processed' ";
                }
                $result=$conn->query($sql);
        ?>
        <CENTER><h2> PROCESSED INCIDENTS OF MAKERS    </h2></CENTER>
                <center>
                <table border="1px">
                <th width="80" height="25">S.NO</th>  
                <th width="200" height="25">ERROR </th>
                <th width="150" height="25">CATEGORY </th>
                <th width="130" height="25">USERNAME</th>
                <th width="350" height="25">DESCRIPTION</th>
                <th width="100" height="25">URL</th>
                <th width="50" height="25">DATE</th>
                <th width="50" height="25">TIME</th>
                <th width="150" height="25">STATUS</th>       
        <?php
        while($row=$result->fetch_assoc()){
            $i++;
                $id=$row["PK"];
                $error=$row["ERROR"];
                $category=$row["CATEGORY"];
                $description=$row["DESCRIPTION"];
                $date=$row["DATE"];
                $time=$row["TIME"];
                $url=$row["URL"];
       ?>
                <tr>
                <td width="10" height="25"><center><?php echo$i; ?></center></td> 
                <td width="100" height="25"><?php echo$error; ?></td>
                <td width="100" height="25"><?php echo$category; ?></td>
                <td width="100" height="25"><center><?php echo$username; ?></center></td>
                <td width="150" height="25"><?php echo$description; ?></td>
                <td width="150" height="25"><center><?php echo$url; ?></center></td>
                <td width="150" height="25"><center><?php echo$date; ?></center></td>
                <td width="150" height="25"> <center><?php echo$time; ?></center></td>
                <td width="100" height="25"> <center><?php echo"Under Process"; ?></center></td>
                </tr>
        <?php } ?>
        </table>
        </center>
        <?php } 
        
        elseif($status_maker==("ALL"))
           {
                if($username_maker=="ALL" && $cat_maker=="ALL")
                {
                    $sql="select * from incident_reg where STATUS='Under Process' ";
                }
                else if($username_maker==("ALL") && ($cat_maker!=("ALL")))
                {
                    $sql="select * from incident_reg where  CATEGORY='".$cat_maker."' AND STATUS='Under Process' ";
                }
                    else if(username_maker!=("ALL") && cat_maker==("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND STATUS='Under Process' ";
                }
                else if($username_maker!=("ALL") && $cat_maker!=("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND CATEGORY='".$cat_maker."' AND STATUS='Under Process' ";
                }
                $result=$conn->query($sql);
        ?>
        <CENTER><h2> UNDER PROCESS INCIDENTS OF MAKERS    </h2></CENTER>
                <center>
                <table border="1px">
                <th width="80" height="25">S.NO</th>  
                <th width="200" height="25">ERROR </th>
                <th width="150" height="25">CATEGORY </th>
                <th width="130" height="25">USERNAME</th>
                <th width="350" height="25">DESCRIPTION</th>
                <th width="100" height="25">URL</th>
                <th width="50" height="25">DATE</th>
                <th width="50" height="25">TIME</th>
                <th width="150" height="25">STATUS</th>
                <th width="100" height="25">UPDATE</th>        
        <?php
        while($row=$result->fetch_assoc()){
            $i++;
                $id=$row["PK"];
                $error=$row["ERROR"];
                $category=$row["CATEGORY"];
                $description=$row["DESCRIPTION"];
                $date=$row["DATE"];
                $time=$row["TIME"];
                $url=$row["URL"];
       ?>
        <form  action="approver_status_db_save.php" method="post" >
                <tr>
                <td width="10" height="25"><center><?php echo$i; ?></center></td> 
                <td width="100" height="25"><?php echo$error; ?></td>
                <td width="100" height="25"><?php echo$category; ?></td>
                <td width="100" height="25"><center><?php echo$username; ?></center></td>
                <td width="150" height="25"><?php echo$description; ?></td>
                <td width="150" height="25"><center><?php echo$url; ?></center></td>
                <td width="150" height="25"><center><?php echo$date; ?></center></td>
                <td width="150" height="25"> <center><?php echo$time; ?></center></td>
                <td width="100" height="25"> <center><?php echo"Under Process"; ?></center></td>
                <td><center><input id="round" type="submit" value="update<?php echo$id; ?>" name="update_submit"/></center></td>
                </tr>
        </form>
        <?php } ?>
        </table>
        </center>
        <?php 
        }
        if($status_maker==("ALL"))
           {
                if($username_maker=="ALL" && $cat_maker=="ALL")
                {
                    $sql="select * from incident_reg where STATUS='Processed' ";
                }
                else if($username_maker==("ALL") && ($cat_maker!=("ALL")))
                {
                    $sql="select * from incident_reg where  CATEGORY='".$cat_maker."' AND STATUS='Processed' ";
                }
                    else if(username_maker!=("ALL") && cat_maker==("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND STATUS='Processed' ";
                }
                else if($username_maker!=("ALL") && $cat_maker!=("ALL"))
                {
                    $sql="select * from incident_reg where  USERNAME='".$username_maker."' AND CATEGORY='".$cat_maker."' AND STATUS='Processed' ";
                }
                $result=$conn->query($sql);
        ?>
        <CENTER><h2> PROCESSED INCIDENTS OF MAKERS    </h2></CENTER>
                <center>
                <table border="1px">
                <th width="80" height="25">S.NO</th>  
                <th width="200" height="25">ERROR </th>
                <th width="150" height="25">CATEGORY </th>
                <th width="130" height="25">USERNAME</th>
                <th width="350" height="25">DESCRIPTION</th>
                <th width="100" height="25">URL</th>
                <th width="50" height="25">DATE</th>
                <th width="50" height="25">TIME</th>
                <th width="150" height="25">STATUS</th>       
        <?php
        while($row=$result->fetch_assoc()){
            $i++;
                $id=$row["PK"];
                $error=$row["ERROR"];
                $category=$row["CATEGORY"];
                $description=$row["DESCRIPTION"];
                $date=$row["DATE"];
                $time=$row["TIME"];
                $url=$row["URL"];
       ?>
                <tr>
                <td width="10" height="25"><center><?php echo$i; ?></center></td> 
                <td width="100" height="25"><?php echo$error; ?></td>
                <td width="100" height="25"><?php echo$category; ?></td>
                <td width="100" height="25"><center><?php echo$username; ?></center></td>
                <td width="150" height="25"><?php echo$description; ?></td>
                <td width="150" height="25"><center><?php echo$url; ?></center></td>
                <td width="150" height="25"><center><?php echo$date; ?></center></td>
                <td width="150" height="25"> <center><?php echo$time; ?></center></td>
                <td width="100" height="25"> <center><?php echo"Under Process"; ?></center></td>
                </tr>
        <?php } ?>
        </table>
        </center>
        <?php } 

        }else{
            echo"<script>window.location='index.php'</script>";
        }
        ?>
</body>
</html>