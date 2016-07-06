<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register</title>
        <script src="java_script/new_user.js"></script>
        <link rel="stylesheet" type="text/css" href="css/new_user.css">
    </head>
    <body bgcolor="#E6E6FA">
         <?php
    session_start();
    $username=$name=$email=$gender=$age=$password=$role=$mob="";
    $check=0;
    if($_SERVER["REQUEST_METHOD"]=="POST" )
    {
        
        
        $username=$_POST["newloginusername"];
        $password=$_POST["newloginpass"];
        $role=$_POST["newloginrole"];
        $name=$_POST["newloginname"];
        $email=$_POST["newloginemail"];
        $gender=$_POST["newlogingender"];
        $age=$_POST["newloginage"];
        $mob=$_POST["newloginmob"];
        //echo $username." ".$password." ".$role;
        
       
        $user='root';
        $pass='';
        $database='test_db';
        $conn=new mysqli('localhost', $user, $pass, $database) or die("Unable to connect");
        //echo("Great work");
 
        $sql="Select * from incident_login";
    
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc())
        {
            $user_check=$row["USERNAME"];
            if($user_check==$username)
            {
               $check=1;
               //out.print(username);
               echo"<script>alert('Username already Exist')</script>";
               //out.println("<script>window.location='detail.jsp.jsp'</script>");
               echo"<script>window.location='new_user.php'</script>";  
               //out.println("<script>document.myform1.newloginusername.focus();</script>")
               //break;
               }
        }
         if($check == 0)
           {
          $sql_2="INSERT INTO incident_login(USERNAME, NAME, PASSWORD, ROLE, EMAIL, GENDER, AGE, MOBILE) VALUES ('".$username."', '".$name."', '".$password."', '".$role."', '".$email."', '".$gender."', '".$age."', '".$mob."')";
          $result=$conn->query($sql_2);
           echo"<script>alert('LOGIN SUCCESS')</script>";
           //out.println("<script>window.location='index.jsp'</script>");
           echo"<script>window.location='index.php'</script>";
           //RequestDispatcher rd=request.getRequestDispatcher("index.html");
           //rd.include(req,res);
           }
    }
  ?>
        <center>
            <h2><b>Registration Form</b></h2>
        <form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit=" return validate()">
        <table border="1px">
            
            <tr>
                <th width="100" height="25">Username</th>
                <td width="100" height="25"> <input type="text" name="newloginusername" required="" placeholder="Enter a unique username"></td>
             <tr>
                  <tr>
                <th width="100" height="25"></th>
                <td width="100" height="25"></td>
             </tr>
                  <tr>
                <th width="100" height="25">Name</th>
                <td width="150" height="25"> <input type="text" name="newloginname" required="" placeholder="Please enter your name"></td>
             </tr>
                  <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
            <tr>
                <th width="100" height="25">Password</th>
                <td width="150" height="25"><input type="password" name="newloginpass" required="" placeholder="Enter your password"></td>
             </tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
              <tr>
                <th width="100" height="25">Role</th>
                <td width="150" height="25"> <input type="radio" name="newloginrole" value="approver" required="">Approver&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="newloginrole" value="maker" required="">Maker</td>
             <tr>
                  <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
              <tr>
                <th width="100" height="25">Email</th>
                <td width="150" height="25"><input type="email" name="newloginemail" required="" placeholder="Please enter your email"></td>
             </tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
             <tr>
                <th width="100" height="25">Gender</th>
                <td width="150" height="25"><input type="radio" name="newlogingender" value="male" required="">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="newlogingender" value="female" required="">Female</td>
             </tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
              <tr>
                <th width="100" height="25">Age</th>
                <td width="150" height="25"> <input type="text" name="newloginage" required="" placeholder="Enter your age"></td>
             </tr>
             <tr>
                <th width="100" height="25"></th>
                <td width="150" height="25"></td>
             </tr>
             
              <tr>
                <th width="100" height="25">Mobile</th>
                <td width="150" height="25"><input type="text" name="newloginmob" required="" placeholder="Enter your contact number"></td>
             </tr>
                 </table>
            <br>
              <input type="submit" class="styled-button-5" value="Submit"/>
             
            </form>     
               
        </center>         
            
    </body>
</html>
