<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>HDC | Edit Patient</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>    
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="editpatient">
            <div class="card">
    <!-- Add Patient Starts Here -->
        <header class="d-flex justify-content-between mt-5 mx-5">
            <h1>Edit Patient</h1>
            <div>
                <a href="patientlist.php" class="px-5 btn btn-secondary btn-lg">Back</a>
            </div>
        </header>
        <!--    <div class="container"> -->
            <?php
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                include("connect.php");
                $sql = "SELECT * FROM `patient-list` WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);

                ?>
            <!--FORM -->
                <form action="process.php" method="post">
                <span>First name : </span>
                    <input type="text" class="box" name="firstname" pattern="[a-zA-Z]*" minlength="3" placeholder="Enter First Name" value="<?php echo $row["firstname"]; ?>" required>
                <span>Last name : </span>
                    <input type="text" class="box" name="lastname" pattern="[a-zA-Z]*" minlength="2" placeholder="Enter Last Name" value="<?php echo $row["lastname"]; ?>" required>
                <span>Email Address : </span>
                    <input type="email" class="box" name="email" value="<?php echo $row["email"]; ?>" placeholder="Enter Email Address" required>
                <span>Phone Number : </span>
                    <input type="number" class="box" name="mobile" pattern="[0-9]{11,14}" value="<?php echo $row["phone"]; ?>" placeholder="Enter Mobile Number" required>
                <span>Birthday : </span>
                    <input type="date" class="box" name="birthday" onkeypress="return true" min="1900/01/01" max="2030/12/31" value="<?php echo $row["birthday"]; ?>" placeholder="Birthday" required>
                <span>Address : </span>
                    <input type="text" class="box" name="address" pattern="[a-zA-Z]*" minlength="3" value="<?php echo $row["address"]; ?>" placeholder="Enter Address" required>
                    <select name="gender" class="box">
                        <option value="Male" <?php if($row["gender"]=="Male"){echo "selected";} ?>>Male</option>
                        <option value="Female" <?php if($row["gender"]=="Female"){echo "selected";} ?>>Female</option>
                    </select>
                <span>Patient Data : </span>
                    <input type="text" class="box" name="data" value="<?php echo $row["data"]; ?>" placeholder="Patient Data" required>
                <input type = "hidden" name = "id" value='<?php echo $row['id']; ?>'>
                <div class="form-element">
                    <input type="submit" name= "editpatient" value="Update Patient" class="px-5 py-3 btn btn-success btn-lg">
                </div>
            </form>
            <?php
            }
            ?>
    <!--    </div>--containter-->
    </div>
</div>
</div>
</div>

</body>
