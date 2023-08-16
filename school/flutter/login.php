<?php

include '../connection.php';


// Getting User email from JSON $obj array and store into $email.
$email = $_POST['email'];

// Getting Password from JSON $obj array and store into $password.
$password = $_POST['password'];

//Applying User Login query with email and password.
$loginQuery = "select * from students where student_id = '".$email."' and password = '".$password."' ";

// Executing SQL Query.
$check = mysqli_fetch_assoc(mysqli_query($con, $loginQuery));

   if(isset($check)){
       
        // Successfully Login Message.
        $onLoginSuccess = 'Success';
        
        // Converting the message into JSON format.
        $SuccessMSG = json_encode($onLoginSuccess);
        
        // Echo the message.
        echo $SuccessMSG ;
    
    }
    
    else{
    
        // If Email and Password did not Matched.
       $InvalidMSG = 'Failure' ;
        
       // Converting the message into JSON format.
       $InvalidMSGJSon = json_encode($InvalidMSG);
        
       // Echo the message.
        echo $InvalidMSGJSon ;
    
    }

mysqli_close($con);
?>
