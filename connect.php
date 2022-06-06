<?php

    // data from form
    $FullName  = $_POST['username'];
    $homeCollectionDate = $_POST['cdate']; 
    $MobileNumber = $_POST['mob']; 
    $EmailID = $_POST['mail']; 
    $testDetails = $_POST['testDetails']; 
    $utmCampaign = $_POST['utmCampaign'];
    $utmMedium = $_POST['utmMedium'];
    $utmSource = $_POST['utmSource'];
    $Address = $_POST['address'];
    // tm.medall.in
    // $conn = new mysqli('10.30.1.30','vendor','Password@123','medal');
	//  $conn = new mysqli('216.48.177.202','qwerty_crp','qwerty_crp_2022','qwerty_crp');
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// $sql = "INSERT INTO form (FullName, homeCollectionDate, MobileNumber , EmailID , testDetails, utmCampaign , utmMedium, utmSource,AddressPin) VALUES ('$FullName', '$homeCollectionDate', '$MobileNumber' , '$EmailID' , '$testDetails', '$utmCampaign' , '$utmMedium', '$utmSource', '$Address' )";
// $sql = "INSERT INTO form (FullName, homeCollectionDate, MobileNumber , EmailID , testDetails, utmCampaign , utmMedium, utmSource,AddressPin) VALUES ('$FullName', '$homeCollectionDate', '$MobileNumber' , '$EmailID' , '$testDetails', '$utmCampaign' , '$utmMedium', '$utmSource', '$Address' )";

// if ($conn->query($sql) === TRUE) {
   

 $url = "https://medinfra.medallcorp.in/blumeapi/api/HCLandingPageLoad";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Accept: application/json",
    "Authorization: Basic TWVkYWxsOllYSjFiaTV3UUcxbFpHRnNiR2wwTG1sdQ==",
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = <<<DATA
    {
    "FullName": "$FullName",
    "homeCollectionDate":  "$homeCollectionDate",
    "MobileNumber":"$MobileNumber",
    "EmailID": "$EmailID",
    "testDetails": "cbc-test",
    "utmCampaign": "Campaign Name",
    "utmMedium": "Medium Name",
    "utmSource": "Tuskmelon",
    "Address": "$Address"
    }
    DATA;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    // for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

	if($resp === '"Success"'){
       header( "refresh:1;url=thankyou.html" );
     
    }
    else{
     echo ("Something went wrong!");
    }
   

    //echo '<script>alert(" Sent Sucessfully...!")</script>';
    
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


// $conn->close();

?>