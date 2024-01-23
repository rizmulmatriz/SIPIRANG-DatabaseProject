<?php
session_start();
include"koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];

  $filter=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($filter);
  $data = mysqli_fetch_array($filter);

  if($cek>0){

    if($data['peran']=='admin'){

    $_SESSION['username'] = $data['username'];
    $_SESSION['peran'] = 'admin';
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['email'] = $data['email'];
    
    header("location:admin/?view=dashboard");

  
  }else if($data['peran']=='user'){
    
    $_SESSION['username'] = $data['username'];
    $_SESSION['peran'] = 'user';
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['email'] = $data['email'];

    header("location:user/?view=datapinjamruangan");

}
}else{
  header("location:index.php?alert=gagal");
}
?>