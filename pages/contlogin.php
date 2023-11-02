<?php

include 'config.php';
session_start();


if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE js_Email = '$email' AND js_pw = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['js_ID'];
      header('location:contlog.php');
   }
   else{
      $message[] = 'incorrect email or password!';
   }

}

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    
    $select = mysqli_query($conn, "SELECT * FROM `client_registration` WHERE c_Email = '$email' AND c_pw = '$pass'") or die('query failed');
    
 
    if(mysqli_num_rows($select) > 0){
       $row = mysqli_fetch_assoc($select);
       $_SESSION['client_id'] = $row['ID'];
       header('location:ccontlog.php');
    }
    else{
       $message[] = 'incorrect email or password!';
    }
 
 }

 if(isset($_POST['submit'])){
    $name = $_POST['fname'];
    $Email = $_POST['email'];
    $msg = $_POST['tymsg'];
    $guest = $_POST["Yes"];

    $sql = "INSERT INTO `contact_Us`(first_Name, email, guest, cont_msg)VALUES('$name','$Email','$guest','$msg')";

    if($conn->query($sql))
    {
        echo "Inserted successfully";
        header('location:contlog.php');
    }
    else
    {
        echo "Error".$conn->error;
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/png" href="../image/lgjob6nn.png">
    <title>Contact Us Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
     integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/c982dead86.js" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/contactUs.css">
    
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="login.php" class="logo"><img src="../image/lgjob6nn.png" alt="">  Job Recruitment Company </a>

        <div class="search-box">
            <input class="search-txt" type="text" name="" placeholder="Type to search">
            <a class="search-btn" href="#">
                <i class="fa-solid fa-magnifying-glass" ></i>
            </a>
        </div>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

    </div>

    <ul class="nav">
        <li class="nav_items">
            <a href="login.php" title="" class="nav_link">Home</a>
        </li>  
        <li class="nav_items">
            <a href="jobspagelogin.php" title="" class="nav_link">Jobs</a>
        </li>
        <li class="nav_items">
            <a href="#" title="" class="nav_link">Other Services</a>
        </li>
        <li class="nav_items">
            <a href="regPagelogin.php" title="" class="nav_link">Registration</a>
        </li>
        <li class="nav_items">
            <a href="#" title="" class="nav_link">Our Clients</a>
        </li>
        <li class="nav_items active">
            <a href="contlogin.php" title="" class="nav_link">Contact Us</a>
        </li>
    </ul>

    <section class="features">
        <div class="box1">
            <a href="jobspagelogin.php">
            <i class="fa-solid fa-magnifying-glass" ></i>
            <p>Latest job</p>
            </a>
        </div>
        <div class="box1 bg-primary">
            <a href="jobspagelogin.php">
                <i class="fa-solid fa-train-subway"></i>
                <p>Railway jobs</p>
            </a>
        </div>
        <div class="box1">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-building-columns"></i>
            <p>Banking</p>
            </a>
        </div>
        <div class="box1">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <p>Engineering</p>
            </a>
          </div>
          <div class="box1 bg-primary">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-kit-medical"></i>
              <p>Medical</p>
              </a>
          </div>
          <div class="box1">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-user"></i>
              <p>Users</p>
            </a>
          </div>
          <div class="box1">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-user"></i>
            <p>Security</p>
            </a>
          </div>
          <div class="box1 bg-primary">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-user-graduate"></i>
              <p>Graduate</p>
              </a>
          </div>
          <div class="box1">
        <a href="jobspagelogin.php">
            <i class="fa-solid fa-person-walking-arrow-right"></i>
            <p>Walk-in</p>
            </a>
          </div>
    </section>

</header>

<!-- header section ends -->

<!-- login form  -->

<div class="login-form-container">

    <div class="form-container">
        <div id="close-login-btn" class="fas fa-times"></div>
    
            <form action="" method="post" enctype="multipart/form-data">
                <h3>login now</h3>
                <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
                ?>
                <input type="email" name="email" placeholder="enter email" class="boxnew" required>
                <input type="password" name="password" placeholder="enter password" class="boxnew" required>
                <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me"> remember me</label>
                </div>
                <input type="submit" name="submit" value="login now" class="btnnew">
                <p>don't have an account? <a href="Jseeker_Reg.php" class="linkreg">regiser now</a></p>
            </form>
    
        </div>

</div>


<!-- contacy us page starts -->
<body>

    <title>Responsive contact us page</title>

    <section class="contact">
    <div class="contact">

        <h2>Contact Us</h2> 
        <p>Email us with any questions or inquiries or call +94 - 0112543310 /
            0894536879. We would be happy to answer your questions.</p>

    </div>
    <div class="container4">
        <div class="contactInfo">
            <div class="Box">
                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <div class="text">
                <h3>Address</h3> 

                <p> ITpl Road,<br>Karnataka, PIN 56066,<br>India</p>
                </div>
            </div>
            <div class="Box">
                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="text">



                <h3>email</h3> 

                <p>Info@Jobmarket.Com</p>
                </div>
            </div>
            <div class="Box">
                <div class="icon"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                <div class="text">

                <h3>Telephone Number </h3> 

                <p>+94 - 0112543310<br>0894536879</p>
                </div>
            </div>
        </div>
        <div class="contactForm">
            <form method="post" action="">
                <h2>Send Message</h2>
            <div class="inputBox">
                <label for="fname">Full name:</label><br>
                <input type="text" id="name" name="fname"><br><br>
            </div>
            <div class="inputBox">
                <label for="email">Email:</label><br>
                <input type="text" id="name" name="email"><br><br>
            </div>
             <p><label for="tymsg">Text Your Message:</label></p>
             <input type = "text" id="name" name="tymsg" rows="4" cols="50">
             <br>
             <input class ="submit1" type="submit" value="Submit" name="submit">
             </form>
             </div>
             
        </div>
    </div>
    </section>
</body>

</head>










<!-- footer section starts  -->

<footer>
    <div class="row">
        <div class="col">
            <img src="R (28).jpg" class="logo2">
            <p>For left, right, and center alignment, responsive classes
                 are available that use the same viewport width breakpoints 
                 as the grid system. Left aligned text on all viewport sizes. 
                 Center aligned text</p>
        </div>
        <div class="col">
            <h3>Office <div class="underline"><span></span></div></h3>
            <p>ITpl Road</p>
            <p>Whitefield, bangalore</p>
            <p>Karnataka, PIN 56066, India</p>
            <p class="email-id"><a href="https://mail.google.com/mail/?view=cm&fs=1&to=info@jobmarket.com&su=Inquiry&body">info@jobmarket.com</a></p>
            <h4>+94 - 0112543310</h4>
        </div>
        <div class="col">
            <h3>Links <div class="underline"><span></span></div></h3>
            <ul>
                <li><a href="../pages/index.html">Home</a></li>
                <li><a href="../pages/index1.html">Jobs</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
        <div class="col">
            <h3>Newsletter <div class="underline"><span></span></div></h3>
            <form class="news">
                <i class="fa-regular fa-envelope"> </i>
                <input type="email" placeholder=" example@gmail.com" required>
                <button type="submit"><i class="fas fa-lock"></i>  Subscribe</button>
            </form>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-pinterest"></i>
            </div>
        </div>
    </div>
    <hr>
    <p class="copyright">Copyright ©️ 2022 Recruitment Company | All rights reserved</p>
</footer>

<!-- footer section ends -->

<!-- loader  -->



<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>













