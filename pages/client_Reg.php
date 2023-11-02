<?php
include 'config.php';

if(isset($_POST['submit'])){
    $cname = mysqli_real_escape_string($conn, $_POST['company_name']);
    $c_uname = mysqli_real_escape_string($conn, $_POST['username']);
    $caddress = mysqli_real_escape_string($conn, $_POST['company_address']);
    $cemail = mysqli_real_escape_string($conn, $_POST['your_email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['clientpw']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['c_pass']));
    $cyear = $_POST["established_year"];
    $cmobile = $_POST["phone"];
    $C_country = $_POST["country"];
    $image2 = $_FILES['image2']['name'];
    $image2_size = $_FILES['image2']['size'];
    $image2_tmp_name = $_FILES['image2']['tmp_name'];
    $image2_folder = 'uploaded_img/'.$image2;
 
    $select2 = mysqli_query($conn, "SELECT * FROM `client_registration` WHERE c_Email = '$cemail' AND c_pw = '$pass'") or die('query failed');

    if(mysqli_num_rows($select2) > 0){
       echo "user already exist"; 
    }else{
       if($pass != $cpass){
          echo "confirm password not matched!";
       }elseif($image2_size > 2000000){
          echo "image size is too large!";
       }else{
          $insert = mysqli_query($conn, "INSERT INTO `client_registration`(c_Name,c_Address, est_Year, c_country,c_Contact_number, c_Email, c_username, c_pw, c_img) VALUES('$cname','$caddress', '$cyear', '$C_country', '$cmobile', '$cemail', '$c_uname', '$pass', '$image2')") or die('query failed');
 
          if($insert){
             move_uploaded_file($image2_tmp_name, $image2_folder);
              echo "registered successfully!";
             header('location:login.php');
          }else{
             echo "registeration failed!";
          }
       }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../image/lgjob6nn.png">
        <title>registration  Form by fantacy Design</title>
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Font-->
        <link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
        <link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        

        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://kit.fontawesome.com/c982dead86.js" crossorigin="anonymous"></script>
        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/client_Reg.css">
        
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
                <li class="nav_items active">
                    <a href="regPagelogin.php" title="" class="nav_link">Registration</a>
                </li>
                <li class="nav_items">
                    <a href="#" title="" class="nav_link">Our Clients</a>
                </li>
                <li class="nav_items">
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

        

        <!-- login form ends -->

        <!-- registration form starts  -->

        <div class="form-v10">
            <div class="page-content">
                <div class="form-v10-content">
                    <form class="form-detail" action="" method="post" id="myform">
                        <?php
                            if(isset($message)){
                                foreach($message as $message){
                                    echo '<div class="message">'.$message.'</div>';
                                }
                            }
                        ?>
                        <div class="form-left">
                            <h2>Client Registration</h2>	
                                <div class="form-row form-row-2">
                                    <input type="text" name="company_name" id="company_name" class="input-text" placeholder="Company Name" required>
                                </div>						
                            
                            <div class="form-group ">
                                <div class="form-row ">
                                    <input type="text" name="established_year" id="established_year" class="input-text" placeholder="Established Year">					
                                </div>                        
                            </div>					
                            <div class="form-row">
                                <input type="text" name="company_address" class="company" id="company_address" placeholder="Company Address" required>
                            </div>
                            <div class="form-group">
                                <div class="form-row ">
                                    <input type="text" name="country" class="country" id="company_address" placeholder="Country" required>					
                                </div>						
                            </div>
                            <div class="form-group">
                                
                                <div class="form-row form-row-3">
                                    <input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email" required>
                            </div>			
                        </div>
                        <div class="form-right">
                            <h2>Log In Details</h2>
                            <div class="form-row">
                                <input type="text" name="username" class="username" id="username" placeholder="Username" required>
                            </div>
                            <div class="form-row">
                                <input type="password" name="clientpw" class="password" id="password" placeholder="Enter Password" required>
                            </div>
                            
                                <div class="form-row">
                                    <input type="password" name="c_pass" class="rpassword" id="rpassword" placeholder="Re-enter Password" required>
                                </div>						
                                <div class="form-row">
                                    <input type="file" name="image2" class="boxnew" accept="image2/jpg, image2/jpeg, image2/png">
                                </div>
                            
                            <div class="form-row-last">
                                <input type="submit" name="submit" class="register" value="Register">
                            </div>
                            <p>already have an account? <a href="login.php"  class="linklog">login now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <!-- registration form ends -->

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
    <script src="../js/scriptother.js"></script>

    </body>
</html>
