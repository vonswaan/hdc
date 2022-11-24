<?php

$conn = mysqli_connect('localhost','root','P@ssw0rd','hdc') or die('connection failed');

if(isset($_POST['register-btn'])){

    $reg_firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $reg_lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $reg_email = mysqli_real_escape_string($conn, $_POST['email']);
    $reg_password = md5($_POST['reg_password']);
    $reg_cpassword = md5($_POST['reg_cpassword']);
    $reg_number = mysqli_real_escape_string($conn, $_POST['number']);
    $reg_birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $reg_gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $reg_usertype = "user";

    $select = " SELECT * FROM `accounts-db` WHERE email = '$reg_email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)>0){

        $error[] = "user *$reg_email* already exist!";

    }else{

        if($reg_password != $reg_cpassword){
            $error[] = 'Password not match!';
        }else{
            $insert = " INSERT INTO `accounts-db`(`firstname`, `lastname`, `email`, `password`, `mobile`, `birthday`,`gender`,`access`) VALUES('$reg_firstname','$reg_lastname','$reg_email','$reg_password','$reg_number','$reg_birthday','$reg_gender','$reg_usertype') ";
            $create = mysqli_query($conn,$insert);
            if($create){
                $success[] = "User *$reg_email* created.";
             }        
        };

    };

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>HDC | Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>    
    
    <!-- contact starts here -->
    <section class="register" id="register">
            <h1 class="heading">Register Account</h1>

            <form id ="createaccount" action="" method="POST">
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';  
                    };
                }elseif(isset($success)){
                    foreach($success as $success){
                        echo '<span class="success-msg">'.$success.'</span>';  
                    };;
                };
                ?>

                <span>First name : </span>
                <input type="text" name="firstname" pattern="[a-zA-Z]*" minlength="3" placeholder="enter firstname" class="box" required>
                <span>Last name : </span>
                <input type="text" name="lastname" pattern="[a-zA-Z]*" minlength="2" placeholder="enter lastname" class="box" required>
                <span>Email addresss : </span>
                <input type="email" name="email" placeholder="enter email" class="box" required>
                <span>Password : </span>
                <input type="password" name="reg_password" minlength="8" class="box" placeholder="Password" required>
                <span>Confirm Password : </span>
                <input type="password" name="reg_cpassword" minlength="8" class="box"  placeholder="Confirm Password" required>
                <span>Mobile number : </span>
                <input type="number" name="number" pattern="[0-9]{11,14}" placeholder="enter number" class="box" required>
                <span>Birthday : </span>
                <input type="date" name="birthday" class="box" required onkeypress="return true" min="1900/01/01" max="2030/12/31" value="">
                <span>Gender : </span>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <input type="submit" value="Create Account" name="register-btn" class="link-btn">
                <span>already have an account? <a href="login.php">Login now</a></span>
            </form>

        </section>

</body>
    <!-- contact ends here -->