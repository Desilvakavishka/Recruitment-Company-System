<?php

    include 'config.php';

    if(isset($_POST['submit'])){
        $first_name = $_POST['fname'];
        $middle_name = $_POST['mname'];
        $last_name = $_POST['lname'];
        $Birthday = $_POST['birthDate'];
        $CurrentAddress = $_POST['Caddress'];
        $StreetAddress = $_POST['Saddress'];
        $City = $_POST['city'];
        $State  = $_POST['state'];
        $mail  = $_POST['Email'];
        $Tel_no	 = $_POST['telNo'];
        $linkedin  = $_POST['LinkedIn'];
        $position   = $_POST['Position'];
        $hear   = $_POST['hearabout'];
        $start_Date = $_POST['startDate'];
        $coverletter = $_POST['comment'];
        $browse_files = $_POST['browse'];
        $target_dir = 'upload_file/'.$browse_files;
        $target_file = $target_dir . basename($_FILES["browse"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $sql = "INSERT INTO `applications`(first_name,middle_name,last_name,DOB,current_address,street_address,city,states,PostalCode,email,telephone_No,LinkedIn,position,h_about,jresume,coverletter)VALUES('$first_name','$middle_name','$last_name','$Birthday','$CurrentAddress', '$StreetAddress', '$City', '$State','$mail','$Tel_no','$linkedin','$position','$hear','$start_Date','$browse_files','$coverletter')";

        if($conn->query($sql))
        {
            echo "Inserted successfully";
            header('location:jobsPage.php');
        }
        else
        {
            echo "Error".$conn->error;
        }
    }
    $conn->close();

?>    