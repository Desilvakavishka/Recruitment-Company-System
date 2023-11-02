<?php

include 'config.php';
session_start();
$client_id = $_SESSION['client_id'];

if(!isset($client_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($client_id);
   session_destroy();
   header('location:login.php');
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
    <link rel="stylesheet" href="../css/postJob.css">
    
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
            <a href="cindexlog.php?logout=<?php echo $client_id; ?>" class="delete-btn">logout</a>
            <p>new <a href="login.php" class="linklog">login</a> or <a href="crepPage.php" class="linkreg">register</a></p>
            </div>
    
        </div>

</div>

<!-- login form ends -->


<!-- Post a job form starts -->
<div class="wrapper">
    <div class="title">
        Post a job form
    </div>
    
    <form method="post" action="form_job_pro.php">
        <h3>Company Details:</h3>
       <div class="inputfield">
          <label>Company Name</label>
          <input type="text" class="input"  name="comName">
       </div>
           <div class="inputfield">
        <label>Vacancy Type</label>
        <div class="custom_select">
          <select name="vacancyType">
            <option value="">choose...</option>
            <option value="Railway">Railway</option>
            <option value="Banking">Banking</option>
            <option value="Engineering">Engineering</option>
            <option value="Medical">Medical</option>
            <option value="Security">Security</option>
            <option value="Security">Garment</option>
            <option value="Security">Office</option>
          </select>
        </div>
     </div>
        <div class="inputfield">
          <label>Email Address</label>
          <input type="text" class="input" name="jvemail">
       </div>  
      <div class="inputfield">
          <label>Street Address</label>
          <textarea class="textarea" name="jvaddress"></textarea>
       </div> 
       <div class="inputfield">
        <label>City</label>
        <input type="text" class="input" name="jvcity">
     </div>
       <div class="inputfield">
        <label>Province</label>
        <input type="text" class="input" name="jvprovince">
     </div>
      <div class="inputfield">
          <label>Postal Code</label>
          <input type="text" class="input" name="jvpostalcode">
       </div> 
       <div class="inputfield">
        <label>Phone Number</label>
        <input type="text" class="input" name="jvtelNumber">
     </div>
     <div class="form">
        <H3>Available Jobs:</H3>
       <div class="inputfield">

       </div>  
           <div class="inputfield">
        <label>Select job type</label>
        <div class="custom_select">
          <select name="jvtype">
            <option value="">Select</option>
            <option value="Part Time">Part Time</option>
            <option value="Full Time">Full Time</option>
          </select>
        </div>
     </div> 
        <div class="inputfield">
          <label>Job title</label>
          <input type="text" class="input" name="jvtitle">
       </div>  
        
     
      <div class="inputfield">
          <label>Work experience required</label>
          <textarea class="textarea" name="jvxpYears" ></textarea>
       </div> 
       <div class="inputfield">
        <label>Age gap</label>
        <input type="text" class="input" name="jvAgegap">
     </div>
     <div class="inputfield">
        <label>Salary</label>
        <input type="text" class="input" name="jvSalary">
     </div>  
       
      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </div>
</form>
</div>
<!-- Post a job form ends -->

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
                <li><a href="cindexlog.php">Home</a></li>
                <li><a href="cjobsPage.php">Jobs</a></li>
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