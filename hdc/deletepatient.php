<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include("connect.php");
        $sql = "DELETE FROM `patient-list` WHERE id = $id";
        if(mysqli_query($conn,$sql)){
            session_start();
            $_SESSION["deletepatient"] = "Patient Record Deleted";
            header("location:patientlist.php");
        }

    }
?>