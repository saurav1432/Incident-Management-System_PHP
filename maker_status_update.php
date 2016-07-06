<!--admin:-saurav1432-->
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
            $error=$_POST["update_error"];
            $category=$_POST["update_category"];
            $description=$_POST["update_description"];
            $url=$_POST["update_url"];
            $submit_button_value=$_POST["update_submit"];
            $status="unseen";
            $substring=  substr($submit_button_value, 6);
            //echo$substring;
            
            $user='root';
            $pass='';
            $database='test_db';
            $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
            
            $sql="update incident_reg set ERROR='".$error."', CATEGORY='".$category."', DESCRIPTION='".$description."', URL='".$url."' where PK='".$substring."' ";
            $conn->query($sql);
            echo"<script>alert('DETAILS SAVED')</script>";
            echo"<script>window.location='maker_status_history.php'</script>";
        }
        else{
            echo"<script>window.location='index.php'</script>";}
        ?>
    </body>
</html>
