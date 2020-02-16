<?php

include '../includes/Query.php';
$myobj= new Query();

if(isset($_POST['name']) && isset($_POST['price']) && isset($_FILES['file'])){
    
    $book = $myobj->PostData('name');
    $price = $myobj->PostData('price');
    $pcode = date('mdis');

    $file = $_FILES['file'];

    if(empty($book) || empty($price)){
        echo "Please Enter all fields";
    }else{
        if(!is_uploaded_file($file['tmp_name'])){
        echo "please choose a file";
    }else{
    //    echo $myobj->fileUpload($_FILES['file']);
            // $file       = $_FILES[$file];
            $file_name  = $file['name'];
            $tmp_name   = $file['tmp_name'];
            $fileError  = $file['error'];
            $fileSize   = $file['size'];
    
                if ( $fileError !== 0) {
                       echo "File Error!, cannot upload \" $file_name \" "," Try again .Thanks";
                   }else{
                       if($fileSize > 3000000){
                            echo "File size too big!, cannot upload \" $file_name \" "," Upload a smaller file image .Thanks";
                       }else{
                           $allowed_extension = ['jpg','png','gif','jpeg'];
                           // this gets the file extension
                           $fileExt = pathinfo($file_name, PATHINFO_EXTENSION);
                           // this gets the file name without the extension
                           $fileactualname = pathinfo($file_name, PATHINFO_FILENAME);
                           // converts any extension in uppercase to lowercase
                           $fileExt = strtolower($fileExt);
                   
                           if(in_array($fileExt, $allowed_extension)){
                               $folder = '../img/';
                               $newname = 'img'.date('mdis').'.'.$fileExt; 
                               move_uploaded_file($tmp_name, $folder.$newname);
                              
                               $sql = "INSERT INTO FirstShop (Name, Image, Price , Pcode) VALUES('$book','$newname','$price','$pcode')";
                               if($myobj->execute_query($sql)){
                                    echo "Data has been Inserted Successfully";
                               }else{
                                   echo "Error Sending Data Into the Database";
                               }
                               }
                       }
                   }
    }
    // $myobj->execute_query();
}

}
?>