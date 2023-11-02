<?php

	require 'config.php';	

	$jcomName = $_POST['comName'];
	$vType = $_POST['vacancyType'];
	$jemail = $_POST['jvemail'];
	$jAddress = $_POST['jvaddress'];
	$jCity = $_POST['jvcity'];
    $jProvince = $_POST['jvprovince'];
	$jpostal_code = $_POST['jvpostalcode'];
	$jtel_Number = $_POST['jvtelNumber'];
	$jtype  = $_POST['jvtype'];
	$jtitle  = $_POST['jvtitle'];
    $jv_exYears  = $_POST['jvxpYears'];
	$jagegap   = $_POST['jvAgegap'];
	$jSalary   = $_POST['jvSalary'];
	

	
 $sql= "INSERT INTO `job_vacancy`(com_Name, v_Type, e_Address, s_Address, City, Province, Postal_Code, tel_Number,jobv_type, j_title,work_exp,age_gap,Salary)VALUES('$jcomName','$vType','$jemail','$jAddress','$jCity','$jProvince','$jpostal_code','$jtel_Number','$jtype', '$jtitle','$jv_exYears', '$jagegap', '$jSalary')";

 if($conn->query($sql))
     {
         echo "Inserted successfully";
		 header('Location:cindexlog.php');
     }
else
     {
        echo "Error:". $conn->error;
     }

$con->close();

?>