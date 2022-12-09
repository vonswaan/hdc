<?php
    include("connect.php");
    #Code
    if(isset($_POST['addpatient'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $bdayview = $newDate = date("M-d-Y", strtotime($birthday));
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $data = mysqli_real_escape_string($conn, $_POST['data']);

        $addpatientsql = "INSERT INTO `patient-list` ( `firstname`, `lastname`, `email`, `phone`, `birthday`,`address`, `gender`, `data`) VALUES ( '$firstname', '$lastname', '$email', '$mobile', '$birthday', '$address', '$gender', '$data')";
        if(mysqli_query($conn, $addpatientsql)){
            session_start();
            $_SESSION["addpatient"] = "Patient added successfully!";
            header("location:patientlist.php");
        }else{
            die("Something went wrong");
        }
    }

    if(isset($_POST['editpatient'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $bdayview = $newDate = date("M-d-Y", strtotime($birthday));
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $data = mysqli_real_escape_string($conn, $_POST['data']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $editpatientsql = "UPDATE `patient-list` SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$mobile', birthday = '$birthday', address = '$address', gender = '$gender', data = '$data' WHERE `patient-list`.`id` =  '$id' ";
        if(mysqli_query($conn, $editpatientsql)){
            session_start();
            $_SESSION["editpatient"] = "Patient Record updated!";
            header("location:patientlist.php");
        }else{
            die("Something went wrong");
        }
    }


    if(isset($_POST['searchbtn']))
    { 
      $query = $_POST['searchbox'];
      $sql = "SELECT * FROM `patient-list` where firstname LIKE '%$query%' or lastname LIKE '%$query%'";
    }
    else
    {
       $sql = "SELECT * FROM `patient-list`";
    }

?>