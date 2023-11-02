<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
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
    <link rel="stylesheet" href="../css/style1.css">
    <link rel = "stylesheet" href="../css/apply a job.css">
    
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="../pages/login.php" class="logo"><img src="../image/lgjob6nn.png" alt="">  Job Recruitment Company </a>

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
            <a href="indexlog.php" title="" class="nav_link">Home</a>
        </li>  
        <li class="nav_items">
            <a href="jobsPage.php" title="" class="nav_link">Jobs</a>
        </li>
        <li class="nav_items">
            <a href="#" title="" class="nav_link">Other Services</a>
        </li>
        <li class="nav_items active">
            <a href="regPage.php" title="" class="nav_link">Registration</a>
        </li>
        <li class="nav_items">
            <a href="#" title="" class="nav_link">Our Clients</a>
        </li>
        <li class="nav_items">
            <a href="contlog.php" title="" class="nav_link">Contact Us</a>
        </li>
    </ul>

    <section class="features">
        <div class="box1">
            <a href="jobsPage.php">
            <i class="fa-solid fa-magnifying-glass" ></i>
            <p>Latest job</p>
            </a>
        </div>
        <div class="box1 bg-primary">
            <a href="jobsPage.php">
                <i class="fa-solid fa-train-subway"></i>
                <p>Railway jobs</p>
            </a>
        </div>
        <div class="box1">
        <a href="jobsPage.php">
            <i class="fa-solid fa-building-columns"></i>
            <p>Banking</p>
            </a>
        </div>
        <div class="box1">
        <a href="jobsPage.php">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <p>Engineering</p>
            </a>
          </div>
          <div class="box1 bg-primary">
        <a href="jobsPage.php">
            <i class="fa-solid fa-kit-medical"></i>
              <p>Medical</p>
              </a>
          </div>
          <div class="box1">
        <a href="jobsPage.php">
            <i class="fa-solid fa-user"></i>
              <p>Users</p>
            </a>
          </div>
          <div class="box1">
        <a href="jobsPage.php">
            <i class="fa-solid fa-user"></i>
            <p>Security</p>
            </a>
          </div>
          <div class="box1 bg-primary">
        <a href="jobsPage.php">
            <i class="fa-solid fa-user-graduate"></i>
              <p>Graduate</p>
              </a>
          </div>
          <div class="box1">
        <a href="jobsPage.php">
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
                $select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE js_ID = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($fetch['pro_img'] == ''){
                    echo '<img src="images/default-avatar.png">';
                }else{
                    echo '<img src="uploaded_img/'.$fetch['pro_img'].'">';
                }
            ?>
            <h3><?php echo $fetch['js_UserName']; ?></h3>
            <a href="update_profile.php" class="btnnew">update profile</a>
            <a href="indexlog.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
            <p>new <a href="login.php" class="linklog">login</a> or <a href="regPage.php" class="linkreg">register</a></p>
            </div>
    
        </div>

</div>

<!-- login form ends -->


<div class = "background">
    <div class = "">
        <h2></h2>
        <br>
        <p class = "sentence">Please Complete the form below to apply for a position with us.</p>
        <hr>
        <div class = "applyform">
        <form action = "appform_process.php" method = "post">
            <h1 id="demo" class="form-header" data-component="header" name="companyN">
                <span id="val">
                  <script src="../js/scriptcheck.js"></script>
                </span>
            </h1>
            <div>
                <p style ="font-size : 14px;">Full Name</h2>
                <br>
                <div>
                    <input class = "name" type = "text" name ="fname" value ="">
                    <input class = "name" type = "text" name ="mname" value ="">
                    <input class = "name" type = "text" name ="lname" value ="">
                    <label id = "label1">First Name </label>
                    <label id = "label2">Middle Name </label>
                    <label id = "label3">Last Name </label>                     
                </div>    
            </div> 
            <p style ="font-size : 14px;">Birth Date
            <input class = "box" type = "date"  name = "birthDate" placeholder = "dd-mm-yyyy"></p>
            <br><br>
            <div>
                <p style ="font-size : 14px;">Current Address</p>
                <br>
                <input class = "name1" type = "text" name="Caddress" value =" ">
            </div>
            <div>
                <p style ="font-size : 14px;">Street Address</p>
                <br>
                <input class = "name1" type = "text" name="Saddress" value =" ">
            </div>
            <div>
                <p style ="font-size : 14px;">State Address line 2</p>
                <br>
                <input class = "name2" type = "text" name="city" value =" ">
                <input class = "name2" type = "text" name = "state" value =" ">
                <br>
                <label id = "label1">City </label>
                <label class = "label4">State / Province </label>
                <br>
                <input class = "name1" type = "text" name="zip" value =" ">
                <label id ="label1"> Postal / Zip Code </label>
            </div>
            <br>
            <p style = "font-size : 14px;"> Email Address </p>
            <br>
            <input class = "name1" type = "email" name = "Email" value = "Ex. Myname@Example.Com">
            <p style = "font-size : 14px;"> Phone Number </p>
            <input class = "name" type = "text" name = "telNo" value = "(000)000-0000">
            <p style = "font-size : 14px;"> Linkedin </p>
            <br>
            <input class = "name1" type = "text" name = "LinkedIn" value = " ">
            <br>
            <p style = "font-size : 14px;"> Position Applied 
            <select class = "box" name = "Position">
                <option>Please Select</option>
                <option>Marketing Specialist</option>
                <option>Marketing manager</option>
                <option>Marketing Director</option>
                <option>Graphic Designer</option>
                <option>Marketing Reseaarch Analyst</option>
                <option>Marketing Communication Manager</option>
                <option>Marketing Consultant</option>
                <option>Brand Manager</option>
                <option>SEO Manager</option> 
                <option>Copywriter</option> 
                <option>Receptionist</option>
                <option>Auditing Clerk</option>
                <option>Account Executive</option>
                <option>Quality Control Coordinator</option>
                <option>Office Clerk</option>
                <option>Supervisor</option>
                <option>Foreman</option>
                <option>Computer Scientist</option>
                <option>UI/UX Designers</option>
                <option>Software Engineer</option>
                <option>Cloud Architect</option>
                <option>Technical Specialist</option>
                <option>Store Manager</option>
                <option>Merchandising Associate</option>
                <option>Plumber</option>
                <option>Roofer</option>
                <option>Director</option>
                <option>Operations Director</option>
                <option>Civil Engineer</option>
                <option>Chemical Engineer</option>
                <option>Biological Engineer</option>
                <option>Director of bean Counting</option>
                <option>Biostatician</option>
                <option>Medical REsearcher</option>
                <option>Teaching Assistant</option>
                <option>Professor</option>
                <option>Computer Animator</option>
                <option>Musician</option>
                <option>Sound Engineer</option>
                <option>actor</option>
                <option>Nurse</option>
                <option>Doctor</option>
                <option>Pharmacist</option>
                <option>Flight Attendant</option>
                <option>Travel Agent</option>
                <option>Hotel Manager</option>
            </select></p>    
            <br><br>
            <p style = "font-size : 14px"> How Did You Hear About Us 
            <select class = "box" name = "hearabout">
                <option>Search Engine</option>
                <option>Google Ads</option>
                <option>Facebook Ads</option>
                <option>YouTube Ads</option>
                <option>Other paid social media advertising</option>
                <option>Facebook post/group</option>
                <option>Twitter post</option>
                <option>Instagram post/story</option>
                <option>Other social Media</option>
                <option>Email</option>
                <option>Radio</option>
                <option>TV</option>
                <option>Newspaper</option>
                <option>Word of mouth</option>
                <option>Other</option>
            </select> </p>
            <br><br>
            <p style = "font-size : 14px"> Available Start Date 
            <input class = "box" type = "date"  name = "startDate" placeholder = "dd-mm-yyyy">
            </p>
            <br><br>
            <p style = "font-size : 14px" class="midtitles"> Upload Your Resume </p>
            <div class = "dragArea">
                <div class="icon"><i class = "fas fa-cloud-upload-alt"></i></div>
                <header>Drag & Drop to Upload Files</header>
                <span>OR</span>
                <button>Browse File </button>
                <input name = "browse" type = "file" class="uploadbtn" accept=".pdf, .docx, .zip">
            </div>  
            <script src=" js/drag.js"> </script>
            <br>
            <p style = "font-size : 14px"> Cover letter </p>
            <textarea name = "comment"> Enter text here</textarea>
            <br>
            
            <button class = "submit" type = "submit" name ="submit" value ="Submit">Submit</button>
            
        </form>
        </div>
    </div>
</div>    



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