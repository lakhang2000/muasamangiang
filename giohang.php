<?php
  include('login.php')
?>
<?php
  include('db/connect.php')
?>
<?php 
    if(isset($_POST['themgiohang'])){
      $ten_sp=$_POST['tensanpham'];
      $ma_sp=$_POST['masanpham'];
      $hinhanh=$_POST['hinhanh'];
      $gia=$_POST['giasanpham'];
      $tencuahang=$_POST['tencuahang'];
      $soluong=$_POST['soluong'];   
      $sql_sl_giohang=mysqli_query($con, "SELECT * FROM giohang WHERE mahanghoa='$ma_sp'");
	    $count=mysqli_num_rows($sql_sl_giohang);
	    if($count > 0){
        $row_sanpham=mysqli_fetch_array($sql_sl_giohang);
        $soluong=$row_sanpham['soluong'] + 1;
        $sql_giohang="UPDATE giohang SET soluong='$soluong' WHERE mahanghoa='$ma_sp'";
	    }else{
		  $soluong=$soluong;
	  	$sql_giohang="INSERT INTO giohang(tenhanghoa,mahanghoa,hinhhanghoa,tencuahang,gia,soluong) VALUES('$ten_sp','$ma_sp','$hinhanh','$tencuahang','$gia','$soluong')";
	    }
	    $insert_row=mysqli_query($con,$sql_giohang);
      if($insert_row==0){
        header('location:chitietsanpham.php?id=' .$ma_sp);
      
      }
    }
?>

<?php 
		if(isset($_GET['xoa'])){
			$id=$_GET['xoa'];
			$sql_del=mysqli_query($con,"DELETE FROM giohang WHERE ID_giohang='$id'");
		}

	
?>
<?php 
	if(isset($_POST['capnhatsoluong'])){
		for($i=0;$i<count($_POST['id_sp']); $i++){
			$ma_sp=$_POST['id_sp'][$i];
			$soluong=$_POST['soluong'][$i];
			if($soluong <= 0){
				$sql_del=mysqli_query($con,"DELETE FROM giohang WHERE mahanghoa='$ma_sp'");
			}else{
				$sql_update=mysqli_query($con,"UPDATE giohang SET soluong='$soluong' WHERE mahanghoa='$ma_sp'");
			}
			

		}
	}	
?>
<?php
if(isset($_POST['thanhtoanlogin'])){
			$ma_kh=$_SESSION['ma_kh'];
			$mahang=rand(0,9999);
      $tenkhachhang=$_POST['tenkhachhang'];
      $sodienthoai=$_POST['sodienthoai'];
      $tendiachi=$_POST['tendiachi'];
      for($i=0;$i<count($_POST['thanhtoan_id_sp']); $i++){				
        $tencuahang=$_POST['tencuahang'][$i];    
        $sql_chitietdon=mysqli_query($con,"INSERT INTO donhang(madonhang,tencuahang,tinhtrang,huydon,makhachhang,tennguoinhan,diachinhan,sodienthoai)
        VALUES($mahang,'$tencuahang',0,0,'$ma_kh','$tenkhachhang','$tendiachi','$sodienthoai')");	
				$ma_sp=$_POST['thanhtoan_id_sp'][$i];
				$soluong=$_POST['thanhtoan_soluong'][$i];
				$gtri=$_POST['gtri'][$i];
				$sql_chitietdonhang=mysqli_query($con,"INSERT INTO chitietdonhang(madonhang,mahanghoa,soluongdat,giadat,tinhtrang,huydon)
				VALUES('$mahang','$ma_sp','$soluong','$gtri',0,0)");
			$sql_delete_thanhtoan=mysqli_query($con,"DELETE FROM giohang WHERE mahanghoa='$ma_sp'");

			 	}
			}
	
	?>
<!DOCTYPE html>
<html lang="en">
    <?php 
      include('header.php')
    ?>
<body>
    <?php
      include('menu.php')
    ?>
    <!-- Poster -->
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <img src="image/avt2.jpg" class="img-fluid" style="height:350px"/>
            </div>
            <div class="col-4">
                <img src="image/avt1.jpg" class="img-fluid" style="height:350px"/>
            </div>
            <div class="col-4">
                <img src="image/avt3.jpg" class="img-fluid" style="height:350px"/>
            </div>
        </div>
    </div> -->
    <!-- Poster -->
    <!-- Cua Hang Noi Bat -->
    <div class="container mb-5">   
        <div class="row mt-3">
            <div class="col-9 shadow-lg p-3 mb-5 bg-body rounded" >
                <div class="row"><h3 style="text-align: center;">Giỏ hàng</h3> </div>
                <?php
				      	$sql_lay_giohang=mysqli_query($con, "SELECT * FROM giohang ORDER BY id_giohang DESC");
				        ?>
                <div class="row">
                    <div class="col-12">
                    <form action="giohang.php" method="POST" name="frgiohang">
                        <table class="table">
                            <thead class="table-dark">
                             <th>STT</th>
                             <th>Sản phẩm</th>
                             <th>Số Lượng</th>
                             <th>Tên sản phẩm</th>
                             <th>Cửa hàng</th>                           
                             <th>Giá</th>
                             <th>Tổng</th>
                             <th>Gỡ</th>
                            </thead>
                            <tbody>
                               
                            <?php 
                                $total=0;
                                $i=0;
                                while($row_fetch_giohang=mysqli_fetch_array($sql_lay_giohang)){ 
                                  $sum=$row_fetch_giohang['soluong'] * $row_fetch_giohang['gia'];
                                  $total+=$sum;
                                  $i++;
                            ?>
                                <tr>
                                  <td><?php echo $i ?></td>
                                  <td>
                                    <a href="single.html">
									                  	<img src="image/<?php echo $row_fetch_giohang['hinhhanghoa'] ?>" style="height:60px;width:60px"alt=" " class="img-responsive">
								                	  </a>
                                  </td>
                                  <td>
                                      <input type="number" min=1 name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>"/>
							                      	<input type="hidden" name="id_sp[]" value="<?php echo $row_fetch_giohang['mahanghoa'] ?>"/>
                                      
                                      
                                  </td>
                                  <td><?php echo $row_fetch_giohang['tenhanghoa'] ?></td>
                                  <td><?php echo $row_fetch_giohang['tencuahang']?></td>
                                  <td><?php echo $row_fetch_giohang['gia']?></td>
                                  <td><?php echo $sum?></td>
                                  <td><button class="btn btn-danger "><a class="text-light" href="?xoa=<?php echo $row_fetch_giohang['ID_giohang']?>" style="text-decoration:none;">Xóa</a></button></td>
                                </tr>
                              <?php 
							                	}
						                  ?>                           
                                <tr>
                                  <td colspan="7" align="center">Tổng Tiền: <?php echo $total?></td>
                                </tr>
                                <tr>
                                  <td colspan="7" style="text-align: center;color:darkmagenta;" ><input class="btn btn-warning" type="submit" value="cập nhật giỏ hàng" name="capnhatsoluong"/>
                                      <?php 
                                        $sql_giohang_sl=mysqli_query($con,"SELECT * FROM giohang ");
                                        $count_giohang_sl=mysqli_num_rows($sql_giohang_sl);
                                        if(isset($_SESSION['dangnhap_home']) && $count_giohang_sl > 0){
                                        while($row_one = mysqli_fetch_array($sql_giohang_sl)){
                                        ?>
                                        <input type="hidden" name="thanhtoan_id_sp[]" value="<?php echo $row_one['mahanghoa'] ?>"/>
                                        <input type="hidden"  name="thanhtoan_soluong[]" value="<?php echo $row_one['soluong'] ?>"/>
                                        <input type="hidden"  name="tencuahang[]" value="<?php echo $row_one['tencuahang'] ?>"/>
                                        <input type="hidden" name="gtri[]" value="<?php echo $row_one['gia'] ?>"/>
                                                                       
                                      <?php 
                                          }
                                      ?> 

                                        <input class="btn btn-warning"  type="submit" value="Thanh Toán" name="thanhtoanlogin" data-bs-toggle="modal" data-bs-target="#Modalthanhtoanlogin"/>
                                            <div class="modal" tabindex="-1" id="Modalthanhtoanlogin">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">                    
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <i class="fa-solid fa-check" style="color:green;font-size:100px"></i>
                                                        <p>Đặt Hàng Thành Công!</p>
                                                        
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                              </div>
                                      </td>
                                      <?php 
                                          }else{
                                      ?>
                                          <button type="button" class="btn btn-warning" name="btnthanhtoan" data-bs-toggle="modal" data-bs-target="#Modalthanhtoan" style="margin-left: 5px;">
                                           Thanh Toán
                                           </button>
                                           <div class="modal" tabindex="-1" id="Modalthanhtoan">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">                    
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <i class="fa-solid fa-xmark" style="color:red;font-size:100px"></i>
                                                    <p>Vui lòng đăng nhập để thanh toán!!</p>
                                                    <!-- <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Thoát</button> -->
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                      <?php
                                          }
                                      ?>
                                  
                                </tr>      
                              
                            </tbody>
                          </table>
                          <div class="row">
                                    <?php 
                                    if(isset($_SESSION['dangnhap_home'])){
                                        $tenkhachhang=$_SESSION['dangnhap_home'];
                                        $sql_capnhat=mysqli_query($con,"SELECT * FROM khachhang,diachikhachhang WHERE khachhang.makhachhang=diachikhachhang.makhachhang AND hoten='$tenkhachhang' ");
                                        $row_capnhat=mysqli_fetch_array( $sql_capnhat);
                                    ?>
                                    <div class="col-md-12">
                                    <h4 class="mt-3">Chi tiết giao hàng</h4>
                                    <label>Tên Khách Hàng:</label> <br>
                                    <input type="text" class="form-control"  name="tenkhachhang" value="<?php echo $row_capnhat['hoten']?>" style="width:300px"/><br>
                                    <label >Số Điện Thoại:</label><br>
                                    <input type="text" class="form-control" name="sodienthoai" value="<?php echo $row_capnhat['sodienthoai']?>" style="width:300px"/><br>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row_capnhat['makhachhang']?>"/>
                                    <label >Địa chỉ</label><br>
                                    <input type="text" class="form-control" name="tendiachi" value="<?php echo $row_capnhat['tendiachi']?>" style="width:300px"/><br>
                              
                                  </div>
                                      <?php

                                  }

                              ?>
                                
                          </div>
                    </form>
                    </div>
                </div>        
            </div>
            <!-- Menu-right -->
            <div class="col-4" style="float:left;width:280px;margin-left: 20px;" >
               
                </div>
                    
            </div>

        </div> 
            <!-- menu-right -->
        </div>
    </div>
    <!-- Cua Hang Noi Bat -->
    <?php
    include('footer.php')
   ?>
</body>
</html>