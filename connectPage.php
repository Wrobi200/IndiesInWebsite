<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    //Database connection
    $conn = new mysqli('localhost','root','***','indiesin');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into connect_form(name, email, description)
        values(?, ?, ?)");
        $stmt->bind_param("sss",$name,$email,$description);
        $stmt->execute();
        echo "Form submited";
        $stmt->close();
        $conn->close();
    }
?>