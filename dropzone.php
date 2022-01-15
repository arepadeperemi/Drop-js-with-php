<?php
//error_reporting(0);
$ds = DIRECTORY_SEPARATOR;  //1


$storeFolder = 'uploads';   //2


 
if (!empty($_FILES)) {

    // Get headers
    //$json = file_get_contents("php://input");
    //$jdecode = json_decode($json, TRUE);
    
    $name = $_POST['name'];
    $email = $_POST['email'];

    $arr = [];
     
    
    
    for($i = 0; $i < (count($_FILES['file']) - 1); $i++){

        $tempFile = $_FILES['file']['tmp_name'][$i];       //3             
      
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
        $targetFile =  $targetPath . time() . $_FILES['file']['name'][$i];  //5

        if(move_uploaded_file($tempFile,   $targetFile)){  //6
            array_push($arr, "success");
        }
    }

    if(count($arr) > 0){
        echo $name . " Hello " . $email;
    }
    else {
        echo "A big error occured";
    }
      
     
}
?>