<?php

$conn = mysqli_connect('localhost','root','P@ssw0rd','hdc') or die('connection failed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])){

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $emaildate = $newDate = date("F-d-Y", strtotime($date));
    $apptime = $_POST['apptime'];
    $apptype = $_POST['apptype'];
    $dentist = $_POST['dentist'];

    $insert = " INSERT INTO `appointment-db`(`firstname`, `lastname`, `email`, `mobile`, `apptype`,`dentist`,`appdate`,`apptime`) VALUES ('$firstname','$lastname','$email','$number','$apptype','$dentist','$date','$apptime')";
    $create = mysqli_query($conn,$insert);

    if($create){
        $message[] = "<i>Appointment booked!<br>Appointment details Sent on</i> <br><b>$email</b>";
       header("Refresh:5");
    }else{
        $message[] = "Appointment Failed"; 
    }

//SEND EMAIL

    $name = "Husmillo Dental";
    $to = "$email";
    $subject = "HDC Appointment Details.";
    $body = "
<html>
<head>
  <title>Appointment Book!</title>
  <style>
table, td {
  border:2px solid black;
  border-collapse: collapse;
  padding: 5px;
}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>

<h3>Appointment booked!</h3>

<p>Thank you for making appointment with us!<br>
Below is the details of your appointment.<br></p>

<table style='width:60%'>
  <tr>
    <td><b>First Name</b></td>
    <td>$firstname</td>
  </tr>
  <tr>
    <td><b>Last Name</b></td>
    <td>$lastname</td>
  </tr>
  <tr>
    <td><b>Appointment Type</b></td>
    <td>$apptype</td>
  </tr>
    <tr>
    <td><b>Appointment Date</b></td>
    <td>$emaildate</td>
  </tr>
    <tr>
    <td><b>Appointment Time</b></td>
    <td>$apptime</td>
  </tr>
    <tr>
    <td><b>Dentist</b></td>
    <td>$dentist</td>
  </tr>
</table>

<p>Please present this in our reception to guide you with your appointment.<br>
Please be arrive earlier before appointed date. <br><br><br>
Thank you,<br>
<b>Husmillo Dental Care</b><br></p>
<img src='img/favicon.png'></img>
</body>
</html>
";



    $from = "hdclipa.smtp@gmail.com";
    $password = "gtvjoucvglculyxt";

    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer();

    //SMTP SETTINGS
    $mail->isSMTP();
    //$mail->SMTPDebug = 3;
    $mail->Host = "smtp.gmail.com"; 
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->Port = 587;
    $mail->SMTPSecure = "tsl";
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );

    //Email Setting
    $mail->isHTML(true);
    $mail->setFrom($from, $name);
    $mail->addAddress($to);
    $mail->Subject = ("$subject");
    $mail->Body = $body;
    if($mail->send()){
     //   echo "Email Sent!";
    }else {
        echo "Error". $mail->ErrorInfo;
    }
    //SEND EMAIL

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>Husmillo DC</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <!-- header starts here -->
    <header class="header fixed-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                
                <a href="index.php" class="logo"><img class="logo-img" src="img/favicon.png">Husmillo <span>Dental Care.</span></a>

                <nav class="nav">
                    <a href="index.php">home</a>
                    <a href="#about">about</a>
                    <a href="#services">services</a>
                    <a href="#dentist">dentist</a>
                    <a href="#contact">contact</a>
                </nav>

                <a href="#contact" class="link-btn">Make Appointment</a>

                <div id="menu-btn" class="fas fa-bars"></div>

            </div>
        </div>
    </header>

    <!-- header ends here -->

    <!-- home starts here -->

    <section class="home" id="home">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="content text-center text-md-left">
                    <h3>Achieve your best smile</h3>
                    <a href="#contact" class="link-btn">make appointment</a>
                </div>
            </div>
        </div>
    </section>
    <!-- home ends here -->

    <!-- about starts here -->
    <section class="about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 image">
                    <img src="img/homebody1.jpg" class="w-100 mb-4 mb-md-0" alt="">
                </div>
                <div class="col-md-6 content">
                    <span>about us</span>
                    <h3>Best Dental Care in Lipa</h3>
                    <p>Safety protocols are implemented 
                    <br>Book your appointments now!
                    <br>Contact us via messenger or via mobile
                    <br>📞 0917 316 4348 Globe
                    <br>☎️ (043) 784 2502
                    <br>Clinic Hours
                    <br>10:00am - 7:00pm
                    <br>Our address is Lipa Town Center, Brgy Sico, Lipa City Batangas </p>
                    <div class="about-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1151.2271744598531!2d121.13404742388869!3d13.943642092809181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6daa1d5553eb%3A0x486c8c7c6b023d7e!2sHusmillo%20Dental%20Care!5e0!3m2!1sen!2sus!4v1664945130069!5m2!1sen!2sus" width="90%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <a href="#contact" class="link-btn">make appointment</a>
                </div>

            </div>
        </div>
    </section>
    <!-- about ends here -->
    <!-- services starts here -->
    <section class="services" id="services">
        <h1 class="heading">Our Services</h1>

        <div class="box-container container">
            <div class="box">
                <img src="img/braces.jpg" alt="">
                <h3>Dental Braces</h3>
                <p>Braces are dental tools that help correct problems with your teeth, like crowding, crooked teeth, or teeth that are out of alignment.</p>
            </div>
            <div class="box">
                <img src="img/oralpro.jpg" alt="">
                <h3>Oral Prophylaxis</h3>
                <p>Oral prophylaxis is a cleaning procedure performed by a dentist or oral hygienist in order to thoroughly clean the teeth.</p>
            </div>
            <div class="box">
                <img src="img/bridges.jpg" alt="">
                <h3>Bridges</h3>
                <p>A bridge is a fixed dental restoration (a fixed dental prosthesis) used to replace one or more missing teeth by joining an artificial tooth definitively to adjacent teeth or dental implants.</p>
            </div>
            <div class="box">
                <img src="img/denture.jpg" alt="">
                <h3>Denture</h3>
                <p>A denture is a removable replacement for missing teeth and surrounding tissues. Two types of dentures are available -- complete and partial dentures.</p>
            </div>
            <div class="box">
                <img src="img/filling.jpg" alt="">
                <h3>Tooth Fillings</h3>
                <p>A tooth filling is a type of dental restoration which repairs damage caused by tooth decay and prolongs the life of the tooth.</p>
            </div>
            <div class="box">
                <img src="img/toothext.jpg" alt="">
                <h3>Tooth Extraction</h3>
                <p>Tooth extraction is performed by a dentist or oral surgeon and is a relatively quick outpatient procedure with either local, general, intravenous anesthesia, or a combination.</p>
            </div>
            <div class="box">
                <img src="img/rootcanal.jpg" alt="">
                <h3>Root Canal Tx</h3>
                <p>A root canal is a dental procedure involving the removal of the soft center of the tooth, the pulp. The pulp is made up of nerves, connective tissue, and blood vessels that help the tooth grow.</p>
            </div>
            <div class="box">
                <img src="img/veneers.jpg" alt="">
                <h3>Veneers</h3>
                <p>Veneers are a prosthetic device, by prescription only, used by the cosmetic dentist. A dentist may use one veneer to restore a single tooth or veneer with high quality that may have been fractured or discolored, or in most cases multiple teeth on the upper arch to create a big bright "Hollywood" type of smile makeover.</p>
            </div>
            <div class="box">
                <img src="img/toothext.jpg" alt="">
                <h3>Dental X Ray</h3>
                <p>Dental X-rays (radiographs) are images of your teeth that your dentist uses to evaluate your oral health. These X-rays are used with low levels of radiation to capture images of the interior of your teeth and gums. This can help your dentist to identify problems, like cavities, tooth decay, and impacted teeth.</p>
            </div>
        </div>

    </section>
    <!-- services ends here -->
    <!-- dentist starts here -->
        <section class="dentist" id="dentist">
            <h1 class="heading">Our Dentists.</h1>
            <div class="box-container container">
                <div class="box">
                    <img src="img/doc1.png" alt="">
                    <p><b>Educational Background</b><br>
                    <b>Doctorate</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>Masteral</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>College</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>High School</b> : <i>Canossa Academy Lipa - 2012</i><br>
                    <b>Elementary</b>: <i>Canossa Academy Lipa - 2008</i><br></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Doc Nico Husmillo</h3>
                </div>
                <div class="box">
                    <img src="img/doc2.png" alt="">
                    <p><b>Educational Background</b><br>
                    <b>Doctorate</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>Masteral</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>College</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>High School</b> : <i>Canossa Academy Lipa - 2012</i><br>
                    <b>Elementary</b>: <i>Canossa Academy Lipa - 2008</i><br></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Doc John Nico Husmillo</h3>
                </div>
                <div class="box">
                    <img src="img/doc3.png" alt="">
                    <p><b>Educational Background</b><br>
                    <b>Doctorate</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>Masteral</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>College</b> : <i>Centro Escolar University - 2018</i><br>
                    <b>High School</b> : <i>Canossa Academy Lipa - 2012</i><br>
                    <b>Elementary</b>: <i>Canossa Academy Lipa - 2008</i><br></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Doc Nicolo Husmillo</h3>
                </div>
            </div>
        </section>
    <!-- dentist ends here -->
    <!-- contact starts here -->
        <section class="contact" id="contact">
            <h1 class="heading">make appointment</h1>

            <form id ="appoint" action="#contact" method="POST">
                <?php
                    if(isset($message)){
                       foreach($message as $message){
                        echo '<p class="message">'.$message.'</p>';
                       } 
                    }
                ?>

                <span>First name : </span>
                <input type="text" name="firstname" pattern="[a-zA-Z]*" minlength="3" placeholder="enter firstname" class="box" required>
                <span>Last name : </span>
                <input type="text" name="lastname" pattern="[a-zA-Z]*" minlength="2" placeholder="enter lastname" class="box" required>
                <span>Email addresss : </span>
                <input type="email" name="email" placeholder="enter email" class="box" required>
                <span>Mobile number : </span>
                <input type="number" name="number" pattern="[0-9]{11,14}" placeholder="enter number" class="box" required>
                <span>Appointment Type : </span>
                <select name="apptype" class="select" form-control>
                    <option value="Dental Brace">Dental Brace</option>
                    <option value="Brace Adjustment">Brace Adjustment</option>
                    <option value="Oral Prophylaxis">Oral Prophylaxis</option>
                    <option value="Bridges">Bridges</option>
                    <option value="Denture">Denture</option>
                    <option value="tooth filling">Tooth Filling</option>
                    <option value="Tooth Extraction">Tooth Extraction</option>
                    <option value="Root Canal Tx">Root Canal Tx</option>
                    <option value="Veneers">Veneers</option>
                    <option value="Dental X-Ray">Dental X-Ray</option>
                </select>
                <span>Dentist : </span>
                <select name="dentist" class="select">
                    <option value="Doc Nico Husmillo">Doc Nico Husmillo</option>
                    <option value="Doc John Nico Husmillo">Doc John Nico Husmillo</option>
                    <option value="Doc Nicolo Husmillo">Doc Nicolo Husmillo</option>
                </select>
                <span>Appointment date : </span>
                <input type="date" name="date" class="box" required onkeypress="return true" min="1900/01/01" max="2030/12/31" value="">
                <span>Appointment Time : </span>
                <select name="apptime" class="select" form-control>
                    <option value="10AM">10AM - 11AM</option>
                    <option value="11AM">11AM - 12PM</option>
                    <option value="12PM">12PM - 1PM</option>
                    <option value="1PM">1PM - 2PM</option>
                    <option value="2PM">2PM - 3PM</option>
                    <option value="3PM">3PM - 4PM</option>
                    <option value="4PM">4PM - 5PM</option>
                    <option value="5PM">5PM - 6PM</option>
                    <option value="6PM">6PM - 7PM</option>
                </select>
                <input type="submit" value="make appointment" name="submit" class="link-btn">
            </form>

        </section>
    <!-- contact ends here -->
    <!-- footer starts here -->

    <section class="footer">
        <div class="box-container container">
            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Address</h3>
                <p>Lipa Town Center, Brgy Sico, Lipa City Batangas</p>
            </div>
            <div class="box">
                <i class="fa-brands fa-facebook"></i>
                <h3>Facebook</h3>
                <p>Husmillo Dental Care</p>
                <p>https://www.fb.com/husmillodental</p>
            </div>
            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <p>0917 316 4348</p>
                <p>(043) 784 2502</p>
            </div>
            <div class="box">
                <i class="fas fa-clock"></i>
                <h3>Clinic Hours</h3>
                <p>10:00am - 7:00pm</p>
            </div>
        </div>

        <div class="credit"> &copy; copyright @ <?php echo date ('Y'); ?> by <span>Von Christian</span></div>

    </section>
    
    











<!-- custom js -->
<script src="js/script.js"></script>
    
</body>
</html>