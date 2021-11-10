<?php
$error='';
    if(isset($_POST['submit'])){
        
        $user=$_POST['user'];
        $email=$_POST['email'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $cpass=$_POST['c_password'];

        if($user=='' || $email =='' || $name=='' ||$pass=='' ||$dob=='')$error='All Fields are required <br>';
        else if(file_exists($user.'.xml'))$error='User already exists';
        else if($pass!=$cpass)$error='Passwords dont match';
        else{
            $xml = new SimpleXMLElement("<user></user>");
            $xml->addChild('pass',$pass);
            $xml->addChild('email',$email);
            $xml->addChild('mobile',$phone);
            $xml->addChild('date',$dob);
            $xml->addChild('name',$name);

            $xml->asXML($user.'.xml');
            session_start();
            $_SESSION['user']=$user;
            header('Location: feed.php');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        
        <form class="box" action="login.php" method="post" >
            <input placeholder= "Name" type="text" id="first_name" name="name">
            
                <input placeholder="Email" type="email" id="email" name="user_email">
            
                <input placeholder="Username" type="text" name="user" id="user">
            
                <input placeholder="Password" type="password" name="pass" id="password">
            
                <input placeholder="Confirm Password" type="password" name="c_password" id="c_password">
            
                <!-- <input placeholder="DOB" type="date" name="dob" id="dob">
            
                <input type="number" name="phone" id="mobile"> -->

            <input type="submit" name="" value="Login">

        </form>

        <div >
            <p>Already have an account?
            <a href="login.php">Login here</a></p>
        </div>

    </div>
    
</body>
</html>