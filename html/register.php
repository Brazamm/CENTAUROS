<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $documento=$_POST['documento'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkdocumento="SELECT * From login where documento='$documento'";
     $result=$conn->query($checkdocumento);
     if($result->num_rows>0){
        echo header ("location: login-fail-cuenta-existente.php");;
     }
     else{
        $insertQuery="INSERT INTO login (nombre,apellido,documento,email,password)
                       VALUES ('$nombre','$apellido','$documento','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: login.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   
}

if(isset($_POST['signIn'])){
   $documento=$_POST['documento'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM login WHERE documento='$documento' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['documento']=$row['documento'];
    header("Location: principal.php");
    exit();
   }
   else{
    echo header("Location: login-fail.php");;
   }

}
?>