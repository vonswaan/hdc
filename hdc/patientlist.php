<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>HDC | Patient List</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
        body{
        background-color: #eee;
        font-weight: 300;
        }
        .card{
        padding: 20px;
        border:none;
        }
        span{
        font-size: 3rem;
        }
        .btn-primary{
            background-color: goldenrod;
            border: goldenrod;
        }
        .btn-primary:hover{
            background-color: black;
            border: black;
        }
   </style>

</head>

<body>    
<div class="row d-flex justify-content-center mt-5 ">
    <div class="col-md-8">
        <div class="patientlist">
            <div class="card">
                <!-- Heading  -->
                <div class="d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">Patient List</span>
                <div class="mx-5 my-4 d-flex ">
                    <form action="patientlist.php" method="post">
                      <input type="text" class="py-2 px-5 rounded border border-secondary" name="searchbox" placeholder="Search Patient">
                      <input type="submit" name="searchbtn" class="p-3 btn btn-secondary" value="Search">
                      </form>
                </div>
                <div class="d-flex flex-row">
                    <a href="addpatient.php" class="btn btn-primary px-5 py-4">Add New Patient</a>
                </div>
                </div>
                <!-- Heading  -->
                    <!-- add patient message  -->
                    <?php 
                    session_start();
                    if(isset($_SESSION["addpatient"])){
                        ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION["addpatient"];
                                unset($_SESSION["addpatient"]);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                <!-- edit patient message  -->
                <?php 
                    if(isset($_SESSION["editpatient"])){
                        ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION["editpatient"];
                                unset($_SESSION["editpatient"]);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                <!-- delete patient message  -->
                <?php 
                    if(isset($_SESSION["deletepatient"])){
                        ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION["deletepatient"];
                                unset($_SESSION["deletepatient"]);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                <!-- Table  -->  
                    <table style="width: 100%; margin:auto;" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fist Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("connect.php");
                                if(isset($_POST['searchbtn']))
                                { 
                                $query = $_POST['searchbox'];
                                $sql = "SELECT * FROM `patient-list` where firstname LIKE '%$query%' or lastname LIKE '%$query%'";
                                $result = mysqli_query($conn,$sql);
                                }
                                else
                                {
                                $sql = "SELECT * FROM `patient-list`";
                                $result = mysqli_query($conn,$sql);
                                }

                                while ($row = mysqli_fetch_array($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"];?></td>
                                        <td><?php echo $row["firstname"];?></td>
                                        <td><?php echo $row["lastname"];?></td>
                                        <td><?php echo $row["phone"];?></td>
                                        <td>
                                            <a href="viewpatient.php?id=<?php echo $row["id"]; ?>" class= "btn btn-info btn-lg">more info</a>
                                            <a href="editpatient.php?id=<?php echo $row["id"]; ?>" class= "btn btn-warning btn-lg">Edit</a>
                                            <a href="deletepatient.php?id=<?php echo $row["id"]; ?>" class= "btn btn-danger btn-lg">Delete</a>
                                        </td>
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