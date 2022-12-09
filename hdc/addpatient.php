<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>HDC | Add Patient</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>    
    
    <!-- Add Patient Starts Here -->
    <section class="addpatient" id="add-patient">
            <h1 class="heading">Add Patient</h1>
        <div class="container">
            <form action="process.php" method="post">
                    <span>First name : </span>
                    <input type="text" class="box" name="firstname" pattern="[a-zA-Z]*" minlength="3" placeholder="Enter First Name" required>
                    <span>Last name : </span>
                    <input type="text" class="box" name="lastname" pattern="[a-zA-Z]*" minlength="2" placeholder="Enter Last Name" required>
                    <span>Email Address : </span>
                    <input type="email" class="box" name="email" placeholder="Enter Email Address" required>
                    <span>Phone Number : </span>
                    <input type="number" class="box" name="mobile" pattern="[0-9]{11,14}" placeholder="Enter Mobile Number" required>
                    <span>Birthday : </span>
                    <input type="date" class="box" name="birthday" onkeypress="return true" min="1900/01/01" max="2030/12/31" placeholder="Birthday" required>
                    <span>Address : </span>
                    <input type="text" class="box" name="address" minlength="3" placeholder="Enter Address" required>
                    <span>Gender : </span>
                    <select name="gender" class="box">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span>Patient Data : </span>
                    <input type="text" class="box" name="data" id="" placeholder="Patient Data" required>
                <div class="form-element">
                    <input type="submit" name= "addpatient" value="Add Patient" class="link-btn">
                    <a href="" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </section>

</body>
    <!-- Add Patient ends here -->