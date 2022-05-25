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

  <div class="container mt-3">
					<div class="row">
              <div class="col-9 shadow-lg p-3 mb-5 bg-body rounded">
						<?php 
							if(isset($_GET['malinhvuc'])){
							$malinhvuc=$_GET['malinhvuc'];
							$sql_tieudelinhvuc=mysqli_query($con, "SELECT * FROM linhvucmuaban,cuahang WHERE linhvucmuaban.malinhvuc=cuahang.malinhvuc AND linhvucmuaban.malinhvuc='$malinhvuc'");
							$row_tieudelinhvuc=mysqli_fetch_array($sql_tieudelinhvuc);

						?>
						
						<!-- <div > -->
            <button type="button" class="btn btn-outline-warning"> Cửa Hàng <?php echo $row_tieudelinhvuc['tenlinhvuc']  ?></button>
							<div class="row" style="width:100%">
								<?php 
									$sql_cuahang=mysqli_query($con, "SELECT * FROM cuahang WHERE malinhvuc='$malinhvuc'");
									while($row_cuahang=mysqli_fetch_array($sql_cuahang)){
										if($row_cuahang['malinhvuc']==$malinhvuc){
								?>
								
								<div class="col-3 mt-5" style="float: right;">
                        <div class="card" style="width: 12rem;">
                              <img src="image/<?php echo $row_cuahang['hinhcuahang'] ?> " class="card-img-top img-fluid" alt="sp_1">
                              <div class="card-body">
                                  <h5 class="card-title"><a href="cuahang.php" style="text-decoration:none;" class="text-danger"><?php echo $row_cuahang['tencuahang'] ?></a></h5>
                                  <a href="cuahang.php?id=<?php  echo $row_cuahang['macuahang'] ?>" class="btn btn-warning">Xem cửa hàng</a>
                              </div>
                        </div>
                </div>
								<?php 
									}
								}
							?>
							</div>
							
						<!-- </div> -->
            
						
						<?php 
							}
						?>
            
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