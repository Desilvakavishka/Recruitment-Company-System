
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
      header('location:indexlog.php');
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
       header('location:cindexlog.php');
    }
    else{
       $message[] = 'incorrect email or password!';
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
    <title>Reqruitment Company</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/c982dead86.js" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    
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
        <li class="nav_items active">
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

<!-- home section starts  -->

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>Most Rated Jobs</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam deserunt nostrum accusamus. Nam alias sit necessitatibus, aliquid ex minima at!</p>
            <a href="jobspagelogin.php" class="btn">View</a>
        </div>

        <div class="swiper job-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="../image/job-vacancy3.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="../image/job-vacancy.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="../image/job-vacancy8.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="../image/job-vacancy2.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="../image/job-vacancy5.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="../image/job-vacancy4.jpg" alt=""></a>
            </div>
            
        </div>

    </div>

</section>

<!-- home section ense  -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fa-solid fa-briefcase"></i>
        <div class="content">
            <h3>Job Security</h3>
            <p>100 Job Security</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100 secure payment</p>
        </div>
    </div>

    <div class="icons">
        <i class="fa-solid fa-earth-americas"></i>
        <div class="content">
            <h3>World wide</h3>
            <p>World wide Jobs</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>

</section>

<!-- icons section ends -->

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>Most rated Jobs</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy1.png" alt="">
                </div>
                <div class="content">
                    <h3>Accountant</h3>
                    <div class="company"><span>Texas Lanka Pvt</span></div>
                    <a href="#popup1" class="btn">View</a>

                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Manager</h3>
                    <div class="company"><span>Ceylon Beverages Pvt</span></div>
                    <a href="#popup2" class="btn">View</a>

                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Announcer</h3>
                    <div class="company"><span>Ceylon Broadcast Pvt</span></div>
                    <a href="#popup3" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Engineer</h3>
                    <div class="company"><span>Jack Engineers Pvt</span></div>
                    <a href="#popup4" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy5.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Web Developer</h3>
                    <div class="company"><span>Ceylon Web-dsigners Pvt</span></div>
                    <a href="#popup5" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Assistant</h3>
                    <div class="company"><span>Teejay Knitters Pvt</span></div>
                    <a href="#popup6" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy8.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Graphic Designer</h3>
                    <div class="company"><span>DNS Graphic Pvt</span></div>
                    <a href="#popup7" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy6.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Clerk</h3>
                    <div class="company"><span>Union Bank</span></div>
                    <a href="#popup8" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy9.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Type Setting</h3>
                    <div class="company"><span>Soba Commuication</span></div>
                    <a href="#popup9" class="btn">View</a>

                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="../image/job-vacancy7.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Director</h3>
                    <div class="company"><span>Osis Company Pvt</span></div>
                    <a href="#popup10" class="btn">View</a>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- featured section ends -->



<!--Popuptexas starts-->
<div class="container1">  
    <div class="popup" id="popup1">
      <div class="popup-inner">
        <div class="popupphoto">
          <img src="../image/job-vacancy1.png" alt="">
        </div>
        <script src="../js/scriptcheck.js"></script>
        <div class="popuptext">
          <h1 id="txt">Texas Lanka Pvt</h1>
          <p class="scroll">Webdevtrick is a blog for web designer and developers.
               We share example of simple web programs with source code. Simple programs 
               make different this blog from others, because others share advanced program.
                And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                We share example of simple web programs with source code. Simple programs 
                make different this blog from others, because others share advanced program.
                 And advance program maybe difficult for beginners.
                 Webdevtrick is a blog for web designer and developers.
                 We share example of simple web programs with source code. Simple programs 
                 make different this blog from others, because others share advanced program.
                  And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                  We share example of simple web programs with source code. Simple programs 
                  make different this blog from others, because others share advanced program.
                   And advance program maybe difficult for beginners.</p>
        </div>
        <div class="middle">
            <a href="Apply_Job.php" class="btnn btn3" onclick="passval();" onclick="openImg();">Apply</a>
        </div>
        
        <a class="closepopup" href="#">X</a>
      </div>
    </div>
</div>

<!--Popup ends-->


<!--PopupCeylon starts-->
<div class="container1">  
    <div class="popup" id="popup2">
        <div class="popup-inner">
            <div class="popupphoto">
                <img src="../image/job-vacancy.jpg" alt="">
            </div>
            
            <div class="popuptext">
                <h1 id="txt1">Ceylon Beverages Pvt</h1>
                <p class="scroll">Webdevtrick is a blog for web designer and developers.
                    We share example of simple web programs with source code. Simple programs 
                    make different this blog from others, because others share advanced program.
                     And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                     We share example of simple web programs with source code. Simple programs 
                     make different this blog from others, because others share advanced program.
                      And advance program maybe difficult for beginners.
                      Webdevtrick is a blog for web designer and developers.
                      We share example of simple web programs with source code. Simple programs 
                      make different this blog from others, because others share advanced program.
                       And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                       We share example of simple web programs with source code. Simple programs 
                       make different this blog from others, because others share advanced program.
                        And advance program maybe difficult for beginners.</p>
            </div>
            <div class="middle">
                <a href="Apply_Job.php" class="btnn btn3" onclick="passval1();">Apply</a>
            </div>
            <a class="closepopup" href="#">X</a>
        </div>
    </div>
</div>
<!--Popup ends-->

<!--PopupBroadcast starts-->
<div class="container1">  
    <div class="popup" id="popup3">
      <div class="popup-inner">
        <div class="popupphoto2">
          <img src="../image/job-vacancy3.jpg" alt="">
        </div>
        
        <div class="popuptext">
          <h1 id="txt2">Ceylon Broadcast Pvt</h1>
          <p class="scroll">Webdevtrick is a blog for web designer and developers.
            We share example of simple web programs with source code. Simple programs 
            make different this blog from others, because others share advanced program.
             And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
             We share example of simple web programs with source code. Simple programs 
             make different this blog from others, because others share advanced program.
              And advance program maybe difficult for beginners.
              Webdevtrick is a blog for web designer and developers.
              We share example of simple web programs with source code. Simple programs 
              make different this blog from others, because others share advanced program.
               And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
               We share example of simple web programs with source code. Simple programs 
               make different this blog from others, because others share advanced program.
                And advance program maybe difficult for beginners.</p>
        </div>
        <div class="middle2">
            <a href="Apply_Job.php" class="btnn btn3" onclick="passval2();">Apply</a>
        </div>
        <a class="closepopup" href="#">X</a>
      </div>
    </div>
</div>
<!--Popup ends-->

<!--PopupJack starts-->
    <div class="container1">  
        <div class="popup" id="popup4">
            <div class="popup-inner">
                <div class="popupphoto">
                    <img src="../image/job-vacancy2.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt3">Jack Engineers Pvt</h1>
                    <p class="scroll">Webdevtrick is a blog for web designer and developers.
                        We share example of simple web programs with source code. Simple programs 
                        make different this blog from others, because others share advanced program.
                         And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                         We share example of simple web programs with source code. Simple programs 
                         make different this blog from others, because others share advanced program.
                          And advance program maybe difficult for beginners.
                          Webdevtrick is a blog for web designer and developers.
                          We share example of simple web programs with source code. Simple programs 
                          make different this blog from others, because others share advanced program.
                           And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                           We share example of simple web programs with source code. Simple programs 
                           make different this blog from others, because others share advanced program.
                            And advance program maybe difficult for beginners.</p>
                </div>
                <div class="middle">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval3();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--PopupWeb starts-->
    <div class="container1">  
        <div class="popup" id="popup5">
            <div class="popup-inner">
                <div class="popupphoto2">
                    <img src="../image/job-vacancy5.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt4">Ceylon Web-dsigners Pvt</h1>
                    <p class="scroll">Webdevtrick is a blog for web designer and developers.
                        We share example of simple web programs with source code. Simple programs 
                        make different this blog from others, because others share advanced program.
                         And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                         We share example of simple web programs with source code. Simple programs 
                         make different this blog from others, because others share advanced program.
                          And advance program maybe difficult for beginners.
                          Webdevtrick is a blog for web designer and developers.
                          We share example of simple web programs with source code. Simple programs 
                          make different this blog from others, because others share advanced program.
                           And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                           We share example of simple web programs with source code. Simple programs 
                           make different this blog from others, because others share advanced program.
                            And advance program maybe difficult for beginners.</p>
                </div>
                <div class="middle2">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval4();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--PopupTeejay starts-->
    <div class="container1">  
        <div class="popup" id="popup6">
            <div class="popup-inner">
                    <div class="popupphoto1">
                        <img src="../image/job-vacancy4.jpg" alt="">
                    </div>
                    
                    <div class="popuptext">
                        <h1 id="txt5">Teejay Knitters Pvt</h1>
                        <p class="scroll">Webdevtrick is a blog for web designer and developers.
                            We share example of simple web programs with source code. Simple programs 
                            make different this blog from others, because others share advanced program.
                             And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                             We share example of simple web programs with source code. Simple programs 
                             make different this blog from others, because others share advanced program.
                              And advance program maybe difficult for beginners.
                              Webdevtrick is a blog for web designer and developers.
                              We share example of simple web programs with source code. Simple programs 
                              make different this blog from others, because others share advanced program.
                               And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                               We share example of simple web programs with source code. Simple programs 
                               make different this blog from others, because others share advanced program.
                                And advance program maybe difficult for beginners.</p>
                    </div>
                    <div class="middle1">
                        <a href="Apply_Job.php" class="btnn btn3" onclick="passval5();">Apply</a>
                    </div>
                    <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--PopupDNS starts-->
    <div class="container1">  
        <div class="popup" id="popup7">
            <div class="popup-inner">
                <div class="popupphoto1">
                    <img src="../image/job-vacancy8.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt6">DNS Graphic Pvt</h1>
                    <p class="scroll">Webdevtrick is a blog for web designer and developers.
                        We share example of simple web programs with source code. Simple programs 
                        make different this blog from others, because others share advanced program.
                         And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                         We share example of simple web programs with source code. Simple programs 
                         make different this blog from others, because others share advanced program.
                          And advance program maybe difficult for beginners.
                          Webdevtrick is a blog for web designer and developers.
                          We share example of simple web programs with source code. Simple programs 
                          make different this blog from others, because others share advanced program.
                           And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                           We share example of simple web programs with source code. Simple programs 
                           make different this blog from others, because others share advanced program.
                            And advance program maybe difficult for beginners.</p>
                </div>
                <div class="middle1">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval6();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--PopupUnion starts-->
    <div class="container1">  
        <div class="popup" id="popup8">
            <div class="popup-inner">
                <div class="popupphoto">
                    <img src="../image/job-vacancy6.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt7">Union Bank</h1>
                    <p class="scroll">Webdevtrick is a blog for web designer and developers.
                        We share example of simple web programs with source code. Simple programs 
                        make different this blog from others, because others share advanced program.
                         And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                         We share example of simple web programs with source code. Simple programs 
                         make different this blog from others, because others share advanced program.
                          And advance program maybe difficult for beginners.
                          Webdevtrick is a blog for web designer and developers.
                          We share example of simple web programs with source code. Simple programs 
                          make different this blog from others, because others share advanced program.
                           And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                           We share example of simple web programs with source code. Simple programs 
                           make different this blog from others, because others share advanced program.
                            And advance program maybe difficult for beginners.</p>
                </div>
                <div class="middle">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval7();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--PopupSoba starts-->
    <div class="container1">  
        <div class="popup" id="popup9">
            <div class="popup-inner">
                <div class="popupphoto1">
                    <img src="../image/job-vacancy9.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt8">Soba Commuication</h1>
                    <p class="scroll">Webdevtrick is a blog for web designer and developers.
                        We share example of simple web programs with source code. Simple programs 
                        make different this blog from others, because others share advanced program.
                         And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                         We share example of simple web programs with source code. Simple programs 
                         make different this blog from others, because others share advanced program.
                          And advance program maybe difficult for beginners.
                          Webdevtrick is a blog for web designer and developers.
                          We share example of simple web programs with source code. Simple programs 
                          make different this blog from others, because others share advanced program.
                           And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                           We share example of simple web programs with source code. Simple programs 
                           make different this blog from others, because others share advanced program.
                            And advance program maybe difficult for beginners.</p>
                </div>
                <div class="middle1">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval8();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--PopupOsis starts-->
    <div class="container1">  
        <div class="popup" id="popup10">
            <div class="popup-inner">
                <div class="popupphoto2">
                    <img src="../image/job-vacancy7.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt9">Osis Company Pvt</h1>
                    <p class="scroll">Webdevtrick is a blog for web designer and developers.
                        We share example of simple web programs with source code. Simple programs 
                        make different this blog from others, because others share advanced program.
                         And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                         We share example of simple web programs with source code. Simple programs 
                         make different this blog from others, because others share advanced program.
                          And advance program maybe difficult for beginners.
                          Webdevtrick is a blog for web designer and developers.
                          We share example of simple web programs with source code. Simple programs 
                          make different this blog from others, because others share advanced program.
                           And advance program maybe difficult for beginners.Webdevtrick is a blog for web designer and developers.
                           We share example of simple web programs with source code. Simple programs 
                           make different this blog from others, because others share advanced program.
                            And advance program maybe difficult for beginners.</p>
                </div>
                <div class="middle2">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval9();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->



<!-- newsletter section starts -->

<section class="newsletter">

    <form action="">
        <h3>subscribe for latest updates</h3>
        <input type="email" name="" placeholder="enter your email" id="" class="box">
        <input type="submit" value="subscribe" class="btn">
    </form>

</section>

<!-- newsletter section ends -->



<!-- deal section starts  -->

<section class="deal">

    <div class="content">
        <h3>Add Your Job Vacancies</h3>
        <h1>$0 For Your First AD</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis in atque dolore tempora quaerat at fuga dolorum natus velit.</p>
        
    </div>

    
    <div class="image">
        <video  controls="none" width="180px" height="240px" autoplay="starts" loop>
            <source src="../video/job11.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            
          </video>
    </div>

</section>

<!-- deal section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

    <h1 class="heading"> <span>client's reviews</span> </h1>

    <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="../image/pic-1.png" alt="">
                <h3>john deo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="../image/pic-2.png" alt="">
                <h3>john deo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="../image/pic-3.png" alt="">
                <h3>john deo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="../image/pic-4.png" alt="">
                <h3>john deo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="../image/pic-5.png" alt="">
                <h3>john deo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="../image/pic-6.png" alt="">
                <h3>john deo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </div>
    
</section>

<!-- reviews section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> <span>our blogs</span> </h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="image">
                    <img src="../image/blog-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="../image/blog-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="../image/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="../image/blog-4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="../image/blog-5.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- blogs section ends -->

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