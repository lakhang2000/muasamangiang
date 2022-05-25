<?php
	session_start();
	include_once('db/connect.php');
 ?>

<?php 
if(isset($_POST['dangnhap_home'])){
  $taikhoan=$_POST['txtemail'];
  $matkhau=$_POST['txtmatkhau'];
  if($taikhoan =="" || $matkhau==""){
    echo '<script>alert("Vui long nhap du thong tin")</script>';
  }
  else{
      $sql_sl_khachhang=mysqli_query($con, "SELECT * FROM khachhang WHERE email='$taikhoan' AND matkhau='$matkhau'");
      $count=mysqli_num_rows($sql_sl_khachhang);
      $row_dangnhap=mysqli_fetch_array($sql_sl_khachhang);
      if($count >0){
          $_SESSION['dangnhap_home']=$row_dangnhap['hoten'];
          $_SESSION['makhachhang']=$row_dangnhap['makhachhang'];
          header('location:giohang.php');
      }else{
          echo '<script>alert("Mật khẩu chưa chính xác")</script>';
      }
      
  }
}elseif(isset($_POST['dangky'])){
$name=$_POST['txtTenDangNhap'];
$phone=$_POST['txtSDT'];
$address=$_POST['diachi'];
$email=$_POST['email'];
$matkhau=$_POST['txtmatkhau'];
if($name==""){
  echo '<script>alert("Ban chua nhap ten")</script>';
}else if($phone==""){
  echo '<script>alert("Ban chua nhap so dien thoai")</script>';
}else if($address==""){
  echo '<script>alert("Ban chua nhap dia chi")</script>';
}else if($email==""){
  echo '<script>alert("Ban chua nhap email")</script>';
}else if($matkhau==""){
  echo '<script>alert("Ban chua nhap mat khau")</script>';
}else{

$sql_khachhang=mysqli_query($con,"INSERT INTO khachhang(hoten,email,matkhau,sodienthoai) VALUES('$name','$email','$matkhau','$phone')");
$sql_sl_khachhang=mysqli_query($con, "SELECT * FROM khachhang ORDER BY makhachhang DESC LIMIT 1");
$row_khachhang=mysqli_fetch_array($sql_sl_khachhang);
$_SESSION['dangnhap_home']=$name;
$_SESSION['makhachhang']=$row_khachhang['makhachhang'];
if(isset($_SESSION['makhachhang'])){
  $MSKH=$_SESSION['makhachhang'];
  $sql_khachhang=mysqli_query($con,"INSERT INTO diachikhachhang(tendiachi,makhachhang) VALUES('$address','$MSKH')");
}


header('location:giohang.php');
}
}
?>
<!-- Admin Dang Nhap -->
<?php 
if(isset($_POST['dangnhap_home'])){
  $taikhoan=$_POST['txtemail'];
  $matkhau=$_POST['txtmatkhau'];
  if($taikhoan =='' || $matkhau==''){
    echo '<script>alert("Vui lòng không để trống")</script>';
  }else{
      $sql_sl_admin=mysqli_query($con, "SELECT * FROM admin WHERE email='$taikhoan' AND matkhau='$matkhau'");
      $count=mysqli_num_rows($sql_sl_admin);
      $row_dangnhap=mysqli_fetch_array($sql_sl_admin);
      if($count >0){
          $_SESSION['dangnhap_home']=$row_dangnhap['tendangnhap'];
          $_SESSION['id']=$row_dangnhap['ID_admin'];
          header('location:admin/index.php');
      }else{
          echo '<script>alert("Mật khẩu chưa chính xác")</script>';
      }
      
  }
}
?>
<!--Admin Dang Nhap Finish -->

<!-- Quan Ly Dang Nhap start-->
<?php 
if(isset($_POST['dangnhap_home'])){
  $taikhoan=$_POST['txtemail'];
  $matkhau=$_POST['txtmatkhau'];
  if($taikhoan =='' || $matkhau==''){
    echo '<script>alert("Vui lòng không để trống")</script>';
  }else{
      $sql_sl_quanly=mysqli_query($con, "SELECT * FROM quanly WHERE email='$taikhoan' AND matkhau='$matkhau'");
      $count=mysqli_num_rows($sql_sl_quanly);
      $row_dangnhap=mysqli_fetch_array($sql_sl_quanly);
      if($count >0){
          $_SESSION['dangnhap_home']=$row_dangnhap['hoten'];
          $_SESSION['id']=$row_dangnhap['ID_quanly'];
          header('location:quanly/index.php');
      }else{
          echo '<script>alert("Mật khẩu chưa chính xác")</script>';
      }
      
  }
}elseif(isset($_POST['taogianhang'])){
  $name=$_POST['txttencuahang'];
  $tenquanly=$_POST['hotenquanly'];
  $sodienthoai=$_POST['txtsodienthoai'];
  $email=$_POST['txtemail'];
  $matkhau=$_POST['txtmatkhau'];
  $diachi=$_POST['diachicuahang'];
  $linhvuc=$_POST['sllinhvuc'];
  $hinhanh=$_FILES['hinhanh']['name'];
  $path='image/';
  $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
  if($name==""){
    echo '<script>alert("Ban chua nhap ten")</script>';
  }else if($sodienthoai==""){
    echo '<script>alert("Ban chua nhap so dien thoai")</script>';
  }else if($diachi==""){
    echo '<script>alert("Ban chua nhap dia chi")</script>';
  }else if($email==""){
    echo '<script>alert("Ban chua nhap email")</script>';
  }else if($matkhau==""){
    echo '<script>alert("Ban chua nhap mat khau")</script>';
  }else{
    $sql_quanly=mysqli_query($con,"INSERT INTO quanly(hoten,email,matkhau,sodienthoai) VALUES('$tenquanly','$email','$matkhau','$sodienthoai')");
    $sql_sl_quanly=mysqli_query($con, "SELECT * FROM quanly ORDER BY ID_quanly DESC LIMIT 1");
    $row_quanly=mysqli_fetch_array($sql_sl_quanly);
    $_SESSION['dangnhap_home']=$tenquanly;
    $_SESSION['ma_ql']=$row_quanly['ID_quanly'];
    if(isset($_SESSION['ma_ql'])){
    $ID_quanly=$_SESSION['ma_ql'];
    $sql_cuahang=mysqli_query($con,"INSERT INTO cuahang(tencuahang,hinhcuahang,diachi,ID_quanly,malinhvuc,new) VALUES('$name','$hinhanh','$diachi','$ID_quanly','$linhvuc',0)");
}

header('location:quanly/index.php');
}
}
?>
<!-- Quan Ly Dang Nhap finish-->

<?php
if(isset($_GET['account'])){
$dangxuat=$_GET['account'];
}else{
$dangxuat='';
}
if($dangxuat=='dangxuat'){
unset($_SESSION['dangnhap_home']);
header('location:../index.php');

}
?>




