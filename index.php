<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home</title>
        <script src="java_script/index_js.js"></script>
        <link rel="stylesheet" type="text/css" href="css/index_css.css">
    </head>
    <body bgcolor="#E6E6FA">
        
    <?php
    session_start();
    $username=$password=$role=$status="";
    $i=0;
    if($_SERVER["REQUEST_METHOD"]=="POST" )
    {
        
        
        $username=$_POST["newloginname"];
        $password=$_POST["newloginpass"];
        $role=$_POST["newloginrole"];
        //echo $username." ".$password." ".$role;
        
        $_SESSION["username"]=$username;
        $_SESSION["role"]=$role;
       // echo $_SESSION["username"];
        $user='root';
        $pass='';
        $database='test_db';
        $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
        //echo("Great work");
 
        $sql="Select * from incident_login";
    
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc())
        {
        //echo"username ".$row["username"]."<br>"."password".$row["password"];
            if( ($username==$row["USERNAME"]) && ($password==$row["PASSWORD"]) &&($role==$row["ROLE"]) )
            {
                //echo"valid user";
                $i=1;
                if($role=="maker")
                {
                    echo "<script>alert('Login Success')</script>";
                    echo"<script>window.location='maker_incident_reg.php'</script>";
                }
                else if($role=="approver")
                {
                    echo "<script>alert('Login Success')</script>";
                    echo"<script>window.location='approver_incident_list.php'</script>";
                }
            }
        }
        if($i!=1){
            echo "<script>alert('Login Failed') </script>";
        }
    }
  ?>
        
  <center><h1><font color="blue">INCIDENT MANAGEMENT  SYSTEM</font><h1></center>
  <div class="container">
      <div class="card card-container">
          <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
          <p id="profile-name" class="profile-name-card"></p>
            
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="form-signin">
              <span id="reauth-email" class="reauth-email"></span>
              <input type="text" name="newloginname" id="inputEmail" class="form-control" placeholder="Username" required=""  value="<?php echo $username;?>">
              <input type="password" name="newloginpass"  id="inputPassword" class="form-control" placeholder="Password" required="" >
              Role : &nbsp;&nbsp;&nbsp;
              <input type="radio" name="newloginrole" value="approver" required="" <?php if (isset($role)&&$role=="approver")echo"checked"; ?> >Approver &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="newloginrole" value="maker" required="" <?php if (isset($role)&&$role=="maker")echo"checked"; ?> >Maker</td>
              <br> <br><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
          </form>
          <a href="new_user.php" class="forgot-password">New User ? Click Here...</a>
       </div>
    </body>
</html>
