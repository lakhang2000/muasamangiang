<?php
  include('db/connect.php')
?>
<?php
  include('login.php')
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
    <!-- Cua Hang Noi Bat -->
    <?php 
       if(isset($_GET['id'])){
         $id=$_GET['id'];
       }
       else{
         $id='';
       }
      $sql_chitiet=mysqli_query($con,"SELECT * FROM hanghoa,loaihanghoa,cuahang 
      WHERE hanghoa.maloaihang=loaihanghoa.maloaihang AND loaihanghoa.macuahang=cuahang.macuahang AND mahanghoa='$id' ");
    ?>
    <?php 
      while($row_chitiet=mysqli_fetch_array($sql_chitiet)){

    ?>
    <div class="container mb-5">   
        <div class="row mt-3">
            <div class="col-9 shadow-lg p-3 mb-5 bg-body rounded" >
                <div class="row card-header "><h3 style="text-align: center;">Chi Tiết Sản Phẩm</h3> </div>
                <div class="row">
                   <div class="col-6 mt-3 ">
                        <img src="image/<?php echo $row_chitiet['hinhhanghoa'] ?>" style="margin-left: 70px;" data-imagezoom="true" class="img-fluid " alt=""> 
                   </div>

                   <div class="col-6 mt-3">
                        <h3 class="mb-3" ><?php echo $row_chitiet['tenhanghoa'] ?></h3>
                        
                        <p class="mb-3">
                            <span class="item_price" style="color:red;"> <i class="fa-solid fa-dollar"></i> Giá chỉ: <?php echo $row_chitiet['giakhuyenmai'] ?>đ</span>
                            <del class="mx-2 font-weight-light text-warning"><?php echo $row_chitiet['giagoc']?>đ</del><br>
                            <label><i class="fa-solid fa-truck-fast"></i> FreeShip + voucher giảm giá 20%</label>
                            <br>Chi Tiết:
                            <span><?php echo $row_chitiet['chitiet'] ?></span>
                            <div class="occasion-cart">
                              <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="giohang.php" method="post">
                                    <fieldset>
                                      <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['tenhanghoa']?>" />
                                      <input type="hidden" name="masanpham" value="<?php echo $row_chitiet['mahanghoa']?>" />
                                      <input type="hidden" name="tencuahang" value="<?php echo $row_chitiet['tencuahang'] ?>" />
                                      <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['giakhuyenmai'] ?>" />
                                      <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['hinhhanghoa'] ?>" />
                                      <input type="hidden" name="soluong" value="1" />
                                      <input type="submit" name="themgiohang" value="Thêm Giỏ Hàng" class="btn btn-outline-warning" />
                                    </fieldset>
                                </form>
                              </div>
                            </div>
				              	</p>

                    </div>
                </div>
                
            </div>
            <!-- Menu-right -->
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
            <!-- menu-right -->
        </div>
    </div>
    <?php 
      }

    ?>
    <!-- Cua Hang Noi Bat -->
    <?php
    include('footer.php')
   ?>
</body>
</html>