<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>HDC | Patient View</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
    body{
        background: #eee;
    }
   </style>
</head>
<body>    
<!--------------------------------------------------------------------------------------->
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="patientlist">
            <div class="card">
                <!-- Heading  -->
                <div class="d-flex justify-content-between align-items-center">
                    <span class="m-3 font-weight-bold">Patient Details and Information</span>
                    <div class="d-flex flex-row">
                    <a href="patientlist.php" class="px-5 py-3 m-3 btn btn-secondary">Back</a>
                </div>
                </div>
                <!-- Heading  -->
                <table style="width: 100%; margin:auto;" class="table table-bordered">
                        <tbody>
                        <?php
                            if(isset($_GET["id"])){
                                $id = $_GET["id"];
                                include("connect.php");
                                $sql = "SELECT * FROM `patient-list` WHERE id= $id";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_array($result);
                                $bday = $row["birthday"];
                                $bdayview = $newDate = date("F d, Y", strtotime($bday));
                        ?>
                                    <tr>
                                        <td><b>First Name</td>
                                        <td><?php echo $row["firstname"];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Last Name</b></td>
                                        <td><?php echo $row["lastname"];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email Address</b></td>
                                        <td><?php echo $row["email"];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mobile Number</b></td>
                                        <td><?php echo $row["phone"];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Birthday</b></td>
                                        <td><?php echo $bdayview;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Address</b></td>
                                        <td><?php echo $row["address"];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender</b></td>
                                        <td><?php echo $row["gender"];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Data</b></td>
                                        <td><?php echo $row["data"];?></td>
                                    </tr>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

</div>


</body>