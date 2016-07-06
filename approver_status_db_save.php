<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        if(isset($_SESSION["username"])){
            $username=$_SESSION["username"];
            $status="Processed";
            $submit_button_value=$_POST["update_submit"];
            $substring=  substr($submit_button_value, 6);
            //echo$substring;
            
            $user='root';
            $pass='';
            $database='test_db';
            $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
            
            $sql="update incident_reg set STATUS='".$status."' where PK='".$substring."'  ";
            $conn->query($sql);
            echo"<script>alert('DETAILS SAVED')</script>";
            echo"<script>window.location='approver_incident_list.php'</script>";
        }
        else{
            echo"<script>window.location='index.php'</script>";}
        ?>
    </body>
</html>
