<?php
session_start();
include"config.php";
if(isset($_POST['uname'])) {
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
}
$uname=validate($_POST['uname']);
$pass=validate($_POST['password']);

if(empty($uname)){
    header("Location:index.php?error=User Name is required");
    exit();
}
if(empty($pass)){
    header("Location:index.php?error=Password is required");
    exit();
}
$sql="SELECT * FROM toko WHERE Nama='$uname' AND Password='$pass'";
$result=mysqli_query($mysqli,$sql);
if(mysqli_num_rows($result)===1){
    $row=mysqli_fetch_assoc($result);
    if($row['Nama']===$uname && $row['Password']===$pass){
        echo "Logged In!";
        $_SESSION['Nama']=$row['Nama'];
        $_SESSION['id']=$row['id_admin'];
        header("Location:home.php");
        exit();
    }
    else{
        
        header("Location: index.php?error=Incorrect User Name or Password");
        exit();
    }
}
else{
    header("Location:index.php?error=Error");
    exit();
}
