<?php
        include 'config.php'; 
        if(isset($_POST['register'])){
                $jsName = $_POST["jobseekerName"];
                $jsEmail= $_POST["jobseekerEmail"];
                $jsUs = $_POST["jobseekerUserName"];
                $jspw= $_POST["jobseekerpw"];
                $cpass = $_POST['cpassword'];
                $jsNo= $_POST["jobseekerNo"];
                $jsGender= $_POST["jobseekerGender"];
                $jsaddress = $_POST["jobseekeraddress"];
                $jsage = $_POST["jobseekerage"];
                $country = $_POST["jobseekercountry"];
                $image = $_FILES['image']['name'];
                $image_size = $_FILES['image']['size'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_folder = 'uploaded_img/'.$image;
                
                 //Linking the configuration file
                 
                

                    if($jspw != $cpass){
                     echo 'confirm password not matched!';
                    }
                    elseif($image_size > 2000000){
                        echo 'image size is too large!';
                     }
                     else{
                        $insert = mysqli_query($con,"INSERT INTO jobseeker (js_Name, js_Email, js_UserName, js_pw, js_mobileNo, js_Gender, js_address, js_age, js_country, pro_img)VALUES('$jsName','$jsEmail','$jsUs','$jspw','$jsNo', '$jsGender','$jsaddress','$jsage','$country', '$image')") or die('query failed');
                        
                        if($insert){
                            move_uploaded_file($image_tmp_name, $image_folder);
                            echo 'registered successfully!';
                            header('location:Jobseeker_Reg.html');
                         }else{
                            echo 'registeration failed!';
                         }
                        
                    }
                    
                    
                }
?>


