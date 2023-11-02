<?php

include 'config.php';
session_start();
$client_id = $_SESSION['client_id'];

if(!isset($client_id)){
   header('location:jobspagelogin.php');
};

if(isset($_GET['logout'])){
   unset($client_id);
   session_destroy();
   header('location:jobspagelogin.php');
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
    <link rel="stylesheet" href="../css/stylejob.css">
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="cindexlog.php" class="logo"><img src="../image/lgjob6nn.png" alt=""> Job Recruitment Company </a>

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
            <a href="cjobsPage.php?logout=<?php echo $client_id; ?>" class="delete-btn">logout</a>
            <p>new <a href="jobspagelogin.php" class="linklog">login</a> or <a href="crepPage.php" class="linkreg">register</a></p>
            </div>
    
        </div>

</div>

<div class="loader loader--active">
    <div class="loader__icon">
      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
        <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"></path>
        <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0C22.32,8.481,24.301,9.057,26.013,10.047z"></path>
        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"></animateTransform>
      </svg>
    </div>
    <div class="loader__tile"></div>
    <div class="loader__tile"></div>
    <div class="loader__tile"></div>
    <div class="loader__tile"></div>
    <div class="loader__tile"></div>
  </div>
  
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



<!-- Products section starts  -->

<section class="product-list">
    <div><h1>Jobs</h1></div>
    <div class="jobcontainer">

        <!--product 1-->
        <div class="card">
            <div class="title">Job 1</div>
            <div class="imag"><img src="../image/R15.webp"></div>
            <div class="text">Job description</div>
            <div><a href="#popup11" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 2-->
        <div class="card">
            <div class="title">Job 2</div>
            <div class="imag"><img src="../image/R17.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup12" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 3-->
        <div class="card">
            <div class="title">Job 3</div>
            <div class="imag"><img src="../image/R222.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup13" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 4-->
        <div class="card">
            <div class="title">Job 4</div>
            <div class="imag"><img src="../image/R131.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup14" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 5-->
        <div class="card">
            <div class="title">Job 5</div>
            <div class="imag"><img src="../image/R100.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup15" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 6-->
        <div class="card">
            <div class="title">Job 6</div>
            <div class="imag"><img src="../image/R18.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup16" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 7-->
        <div class="card">
            <div class="title">Job 7</div>
            <div class="imag"><img src="../image/R141.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup17" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 8-->
        <div class="card">
            <div class="title">Job 8</div>
            <div class="imag"><img src="../image/R19.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup18" ><button class="apply-butt">Apply</button></a></div>
        </div>
    
        <!--product 9-->
        <div class="card">
            <div class="title">Job 9</div>
            <div class="imag"><img src="../image/R111.png"></div>
            <div class="text">Job description</div>
            <div><a href="#popup19" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 10-->
        <div class="card">
            <div class="title">Job 10</div>
            <div class="imag"><img src="../image/R161.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup20" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 11-->
        <div class="card">
            <div class="title">Announcer</div>
            <div class="imag"><img src="../image/job-vacancy3.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup21" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 12-->
        <div class="card">
            <div class="title">Job 12</div>
            <div class="imag"><img src="../image/R999.png"></div>
            <div class="text">Job description</div>
            <div><a href="#popup22" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 13-->
        <div class="card">
            <div class="title">Job 13</div>
            <div class="imag"><img src="../image/security-job1.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup23" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 14-->
        <div class="card">
            <div class="title">Job 14</div>
            <div class="imag"><img src="../image/R122.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup24" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 15-->
        <div class="card">
            <div class="title">Job 15</div>
            <div class="imag"><img src="../image/R5.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup25" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 16-->
        <div class="card">
            <div class="title">Job 16</div>
            <div class="imag"><img src="../image/R11.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup26" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 17-->
        <div class="card">
            <div class="title">Job 17</div>
            <div class="imag"><img src="../image/med-job2.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup27" ><button class="apply-butt">Apply</button></a></div>
        </div>

        <!--product 18-->
        <div class="card">
            <div class="title">Job 18</div>
            <div class="imag"><img src="../image/job-vacancy.jpg"></div>
            <div class="text">Job description</div>
            <div><a href="#popup28" ><button class="apply-butt">Apply</button></a></div>
        </div>
    </div>
</section>


<!-- Job list popup box with image and details  starts -->
<!--  -->
<!--  -->
<!--  -->
<!--Job1 starts-->
<div class="container1">  
    <div class="popup" id="popup11">
      <div class="popup-inner">
        <div class="popupphoto3">
          <img src="../image/R15.webp" alt="">
        </div>
        
        <div class="popuptext">
          <h1 id="txt10">Job1 Company Pvt</h1>
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
        <div class="middle3">
            <a href="Apply_Job.php" class="btnn btn3" onclick="passval10();">Apply</a>
        </div>
        
        <a class="closepopup" href="#">X</a>
      </div>
    </div>
</div>

<!--Popup ends-->


<!--Job2 starts-->
<div class="container1">  
    <div class="popup" id="popup12">
        <div class="popup-inner">
            <div class="popupphoto3">
                <img src="../image/R17.jpg" alt="">
            </div>
            
            <div class="popuptext">
                <h1 id="txt11">Job2 Company Pvt</h1>
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
            <div class="middle3">
                <a href="Apply_Job.php" class="btnn btn3" onclick="passval11();">Apply</a>
            </div>
            <a class="closepopup" href="#">X</a>
        </div>
    </div>
</div>
<!--Popup ends-->

<!--Job3 starts-->
<div class="container1">  
    <div class="popup" id="popup13">
      <div class="popup-inner">
        <div class="popupphoto4">
          <img src="../image/R222.jpg" alt="">
        </div>
        
        <div class="popuptext">
          <h1 id="txt12">Job3 Company Pvt</h1>
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
            <a href="Apply_Job.php" class="btnn btn3" onclick="passval12();">Apply</a>
        </div>
        <a class="closepopup" href="#">X</a>
      </div>
    </div>
</div>
<!--Popup ends-->

<!--Job4 starts-->
    <div class="container1">  
        <div class="popup" id="popup14">
            <div class="popup-inner">
                <div class="popupphoto5">
                    <img src="../image/R131.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt13">Job4 Company Pvt</h1>
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
                <div class="middle4">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval13();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job5 starts-->
    <div class="container1">  
        <div class="popup" id="popup15">
            <div class="popup-inner">
                <div class="popupphoto6">
                    <img src="../image/R100.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt14">Job5 Company Pvt</h1>
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
                <div class="middle5">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval14();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job6 starts-->
    <div class="container1">  
        <div class="popup" id="popup16">
            <div class="popup-inner">
                    <div class="popupphoto7">
                        <img src="../image/R18.jpg" alt="">
                    </div>
                    
                    <div class="popuptext">
                        <h1 id="txt15">Job6 Company Pvt</h1>
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
                    <div class="middle6">
                        <a href="Apply_Job.php" class="btnn btn3" onclick="passval15();">Apply</a>
                    </div>
                    <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job7 starts-->
    <div class="container1">  
        <div class="popup" id="popup17">
            <div class="popup-inner">
                <div class="popupphoto1">
                    <img src="../image/R141.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt16">Job7 Company Pvt</h1>
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
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval16();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job8 starts-->
    <div class="container1">  
        <div class="popup" id="popup18">
            <div class="popup-inner">
                <div class="popupphoto">
                    <img src="../image/R19.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt17">Job8 Company Pvt</h1>
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
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval17();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job9 starts-->
    <div class="container1">  
        <div class="popup" id="popup19">
            <div class="popup-inner">
                <div class="popupphoto3">
                    <img src="../image/R111.png" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt18">Job9 Company Pvt</h1>
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
                <div class="middle3">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval18();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job10 starts-->
    <div class="container1">  
        <div class="popup" id="popup20">
            <div class="popup-inner">
                <div class="popupphoto7">
                    <img src="../image/R161.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt19">Job10 Company Pvt</h1>
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
                <div class="middle6">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval19();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job11 starts-->
<div class="container1">  
    <div class="popup" id="popup21">
      <div class="popup-inner">
        <div class="popupphoto2">
          <img src="../image/job-vacancy3.jpg" alt="">
        </div>
        
        <div class="popuptext">
          <h1 id="txt20">Ceylon Broadcast Pvt</h1>
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
            <a href="Apply_Job.php" class="btnn btn3" onclick="passval20();" onclick="openImg();">Apply</a>
        </div>
        
        <a class="closepopup" href="#">X</a>
      </div>
    </div>
</div>

<!--Popup ends-->


<!--Job12 starts-->
<div class="container1">  
    <div class="popup" id="popup22">
        <div class="popup-inner">
            <div class="popupphoto">
                <img src="../image/R999.png" alt="">
            </div>
            
            <div class="popuptext">
                <h1 id="txt21">Job12 Company Pvt</h1>
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
                <a href="Apply_Job.php" class="btnn btn3" onclick="passval21();">Apply</a>
            </div>
            <a class="closepopup" href="#">X</a>
        </div>
    </div>
</div>
<!--Popup ends-->

<!--Job13 starts-->
<div class="container1">  
    <div class="popup" id="popup23">
      <div class="popup-inner">
        <div class="popupphoto6">
          <img src="../image/security-job1.jpg" alt="">
        </div>
        
        <div class="popuptext">
          <h1 id="txt22">Job13 Company Pvt</h1>
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
        <div class="middle5">
            <a href="Apply_Job.php" class="btnn btn3" onclick="passval22();">Apply</a>
        </div>
        <a class="closepopup" href="#">X</a>
      </div>
    </div>
</div>
<!--Popup ends-->

<!--Job14 starts-->
    <div class="container1">  
        <div class="popup" id="popup24">
            <div class="popup-inner">
                <div class="popupphoto">
                    <img src="../image/R122.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt23">Job14 Company Pvt</h1>
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
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval23();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job15 starts-->
    <div class="container1">  
        <div class="popup" id="popup25">
            <div class="popup-inner">
                <div class="popupphoto2">
                    <img src="../image/R5.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt24">Job15 Company Pvt</h1>
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
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval24();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job16 starts-->
    <div class="container1">  
        <div class="popup" id="popup26">
            <div class="popup-inner">
                    <div class="popupphoto8">
                        <img src="../image/R11.jpg" alt="">
                    </div>
                    
                    <div class="popuptext">
                        <h1 id="txt25">Job16 Company Pvt</h1>
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
                    <div class="middle7">
                        <a href="Apply_Job.php" class="btnn btn3" onclick="passval25();">Apply</a>
                    </div>
                    <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job17 starts-->
    <div class="container1">  
        <div class="popup" id="popup27">
            <div class="popup-inner">
                <div class="popupphoto8">
                    <img src="../image/med-job2.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt26">Job17 Company Pvt</h1>
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
                <div class="middle7">
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval26();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->

<!--Job18 starts-->
    <div class="container1">  
        <div class="popup" id="popup28">
            <div class="popup-inner">
                <div class="popupphoto">
                    <img src="../image/job-vacancy.jpg" alt="">
                </div>
                
                <div class="popuptext">
                    <h1 id="txt27">Job18 Company Pvt</h1>
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
                    <a href="Apply_Job.php" class="btnn btn3" onclick="passval27();">Apply</a>
                </div>
                <a class="closepopup" href="#">X</a>
            </div>
        </div>
    </div>
<!--Popup ends-->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!-- Job list popup box with image and details -->


<!-- arrivals section starts  -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>Newest Jobs</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <!-- job item 1 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/med-job1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Medi - Jobs</h3>
                    <!-- <div class="viewbtn" href="#popup29">View</div> -->
                    <div class="company-name"><span>company 1</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>
            
            <!-- job item 2 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/med-job2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Medi - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 2</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <!-- job item 3 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/med-job3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Medi - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 3</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        
                    </div>
                </div>
            </a>

            <!-- job item 4 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/med-job4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Medi - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 4</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <!-- job item 5 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/med-job5.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Medi - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 5</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <!-- job item 6 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/security-job.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Security - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 6</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <!-- job item 7 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/R1.png" alt="">
                </div>
                <div class="content">
                    <h3>Technician - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 7</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <!-- job item 8 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/R10.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Assistant - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 8</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <!-- job item 9 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/R11.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Executive - Jobs</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 9</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        
                    </div>
                </div>
            </a>

            <!-- job item 10 -->
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="../image/R13.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Senior Rec Leader</h3>
                    <!-- <div class="viewbtn" href="#">View</div> -->
                    <div class="company-name"><span>company 10</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

</section>






<!-- deal section starts  -->

<section class="deal">

    <div class="content">
        <h3>Add Your Job Vacancies</h3>
        <h1>$0 For Your First AD</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis in atque dolore tempora quaerat at fuga dolorum natus velit.</p>
        <a href="#" class="btn">POST A JOB</a>
    </div>

    
    <div class="image">
        <video  controls="none" width="180px" height="240px" autoplay="starts" loop>
            <source src="../video/job11.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            
          </video>
    </div>

</section>

<!-- deal section ends -->



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