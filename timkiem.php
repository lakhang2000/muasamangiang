<?php
	
	include_once('db/connect.php');
 ?>
 <?php 
  include("login.php")
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
    <?php 
      include('header.php')
    ?>
<body>
    <?php
    include('menu.php')
    ?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-4">
                <img src="image/avt5.jpg" class="img-fluid" style="height:350px"/>
              
            </div>
            <div class="col-4">
                <img src="image/avt10.jpg" class="img-fluid" style="height:350px"/>
            </div>
            <div class="col-4">
                <img src="image/avt7.jpg" class="img-fluid" style="height:350px"/>
            </div>
        </div>
    </div>
    <div class="container mt-3">
	<div class="row">
        <div class="col-9 shadow-lg p-3 mb-5 bg-body rounded">
		<?php 
            if(isset($_POST['search_button'])){
                $tukhoa=$_POST['search_product'];
                $sql_pro=mysqli_query($con, "SELECT * FROM hanghoa WHERE tenhanghoa LIKE '%$tukhoa%'");
                $title=$tukhoa;
                
            }
        ?>
        <h4 class="text-center mb-lg-5 mb-sm-4 mb-3">Bạn đã tìm kiếm: <?php echo $title ?></h4>
        <div class="row">		
			<?php 									
				while($row_product=mysqli_fetch_array($sql_pro)){										
			?>																
				<div class="col-md-3 shadow-lg p-3 bg-body rounded mt-2 " style="margin-left: 10px;">
                    <div class="men-pro-item simple Cart_shelfItem">
                        <div class="men-thumb-item text-center">
                            <img src="image/<?php echo $row_product['hinhhanghoa'] ?> " style="height:200px;" class="card-img-top img-fluid" alt="sp_1">
                        </div>
                        <div class="item-info-product text-center border-top mt-4">                      
                                    <span class="fs-5"><?php echo $row_product['tenhanghoa']?></span>
                                <div class="info-product-price my-2">
                                    <button class="btn btn-outline-warning"><?php echo $row_product['giagoc']?>đ</button>
                                          <a href="chitietsanpham.php?id=<?php  echo $row_product['mahanghoa'] ?>" class="btn btn-warning"><i class="fa-solid fa-gears"></i> Chi Tiết</a>
                                          
                                </div>
                                        
                        </div>
                    </div>
				</div>
			<?php 
			    }
									
			?>															
        </div>
        <!-- end -->
		</div>	
        <div class="col-2" style="float:left;width:280px;margin-left: 20px;">
                <div class="row">
                     <div class="shadow-lg p-3 mb-5 bg-body rounded">
                         <div class="row">
                              <div class="col-12 text-danger">Hộp Thư Góp Ý <span class="text-danger">*</span></div><br><br>
                              <div><input type="text" class="form-control" name="txtbaocao" id="txtbaocao" style="height:100px;"/></div>
                              <div class="col-12 mt-3" style="text-align:center">
                                  <i class="fa-solid fa-star text-warning" style="font-size: 20px;"></i>
                                  <i class="fa-solid fa-star text-warning" style="font-size: 20px;"></i>
                                  <i class="fa-solid fa-star text-warning" style="font-size: 20px;"></i>
                                  <i class="fa-solid fa-star text-warning" style="font-size: 20px;"></i>
                                  <i class="fa-solid fa-star text-warning" style="font-size: 20px;"></i>
                                  <span>5.0</span>
                              </div><br><br>
                              <hr>

                         </div>
                         <div>
                              <span class="mb-3 text-danger">Lĩnh Vực Mua Bán</span>                               
                                <ul style="list-style-type: none;">
                                  <?php 
                                    $sql_sidebar=mysqli_query($con,'SELECT * FROM linhvucmuaban');
                                    while($row_linhvuc_sidebar = mysqli_fetch_array($sql_sidebar)) {
                                  ?>
                                    <li>                                    
                                      <span class="span"> <a href="linhvuc.php?malinhvuc=<?php echo $row_linhvuc_sidebar['malinhvuc'] ?>" style="text-decoration:none"><?php echo $row_linhvuc_sidebar['tenlinhvuc'] ?></a></span>
                                    </li>
                                  <?php 
                                    }
                                  ?>
                                </ul>
                         </div>
                         <button type="button" class="btn btn-primary btn-warning" data-bs-toggle="modal" data-bs-target="#ModalDangKy" style="margin-left: 5px;">
                          <i class="fa-solid fa-user"></i> Đăng Ký Ngay ->>>
                         </button>
                         
                     </div>
                </div>
                    
            </div>
			</div>
	</div>
  <?php
    include('footer.php')
   ?>
</body>
</html>