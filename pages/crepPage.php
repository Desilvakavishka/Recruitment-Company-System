<?php

include 'config.php';
session_start();
$client_id = $_SESSION['client_id'];

if(!isset($client_id)){
   header('location: regPagelogin.php');
};

if(isset($_GET['logout'])){
   unset($client_id);
   session_destroy();
   header('location: regPagelogin.php');
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../image/lgjob6nn.png">
    <title>Reqruitment Company</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/c982dead86.js" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/Reg_style.css">
    
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="cindexlog.php" class="logo"><img src="../image/lgjob6nn.png" alt="">  Job Recruitment Company </a>

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
        <li class="nav_items active">
            <a href="cindexlog.php" title="" class="nav_link">Home</a>
        </li>  
        <li class="nav_items">
            <a href="cjobsPage.php" title="" class="nav_link">Jobs</a>
        </li>
        <li class="nav_items">
            <a href="#" title="" class="nav_link">Other Services</a>
        </li>
        <li class="nav_items">
            <a href="crepPage.php" title="" class="nav_link">Registration</a>
        </li>
        <li class="nav_items">
            <a href="#" title="" class="nav_link">Our Clients</a>
        </li>
        <li class="nav_items">
            <a href="ccontlog.php" title="" class="nav_link">Contact Us</a>
        </li>
    </ul>

    <section class="features">
        <div class="box1">
            <a href="cjobsPage.php">
            <i class="fa-solid fa-magnifying-glass" ></i>
            <p>Latest job</p>
            </a>
        </div>
        <div class="box1 bg-primary">
            <a href="cjobsPage.php">
                <i class="fa-solid fa-train-subway"></i>
                <p>Railway jobs</p>
            </a>
        </div>
        <div class="box1">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-building-columns"></i>
            <p>Banking</p>
            </a>
        </div>
        <div class="box1">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <p>Engineering</p>
            </a>
          </div>
          <div class="box1 bg-primary">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-kit-medical"></i>
              <p>Medical</p>
              </a>
          </div>
          <div class="box1">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-user"></i>
              <p>Users</p>
            </a>
          </div>
          <div class="box1">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-user"></i>
            <p>Security</p>
            </a>
          </div>
          <div class="box1 bg-primary">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-user-graduate"></i>
              <p>Graduate</p>
              </a>
          </div>
          <div class="box1">
        <a href="cjobsPage.php">
            <i class="fa-solid fa-person-walking-arrow-right"></i>
            <p>Walk-in</p>
            </a>
          </div>
    </section>

</header>

<!-- header section ends -->


<!-- login form  -->

<div class="login-form-container">

    <div class="container">
        <div id="close-login-btn" class="fas fa-times"></div>
            <div class="profile">
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `client_registration` WHERE ID = '$client_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($fetch['c_img'] == ''){
                    echo '<img src="images/default-avatar.png">';
                }else{
                    echo '<img src="uploaded_img/'.$fetch['c_img'].'">';
                }
            ?>
            <h3><?php echo $fetch['c_username']; ?></h3>
            <a href="update_cprofile.php" class="btnnew">update profile</a>
            <a href="crepPage.php?logout=<?php echo $client_id; ?>" class="delete-btn">logout</a>
            <p>new <a href="regPagelogin.php" class="linklog">login</a> or <a href="crepPage.php" class="linkreg">register</a></p>
            </div>
    
        </div>
    </div>

<!-- Registration form starts-->
  
        <div class="boxcontainer">
            <div class="container2">
                <div class="content">
                    <div class="col-1">
                        <div class="title">JOBSEEKER REGISTRATION</div>

                        <p><br><br>Knowing how to talk about your computer operations positions will link you 
                            with your next IT specialist, engineer, programmer, or more. Use this site 
                            to takea turning point in your life. You can find the best job vacancies and 
                            can select the best by rated one's, so register to get started by today.</p>

                            <div class="buttonreg">
                                <a href="Jseeker_Reg.php">Register</a>
                            </div>
                    </div>
                    <div class="col-1">
                        <div class="title">CLIENT REGISTRATION</div>
                        <p><br><br>Optimize your job posting by inviting interested Job Seekers to apply.
                             Include instructions for applying from the job board, your company’s website,
                              or at recruiting events. If you have more information about the hiring timeline
                               and next steps in the hiring process, such as a technical interview and assessment,
                                it’s helpful to include it. Post your Job vacancy and get employees with matching requirements.</p>
                                <div class="buttonreg1">
                                    <a href="client_Reg.php">Register</a>
                                </div>
                    </div>
               
                </div>
                
              </div>
            
        </div>

<!-- Registration form ends -->

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