<?php
  include('login.php')
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
    <!-- Poster -->
    <!-- Danh Muc Hot-->
    <div class="container mt-3 mb-3">
        <div class="row">         
          <div class="col-3"><button type="button" class="btn btn-danger">Lĩnh Vực Nổi Bật</button></div>
          <div class="col-9"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php
              $sql_cate_home=mysqli_query($con,'SELECT * FROM linhvucmuaban');
              while($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
                 $id_danhmuc=$row_cate_home['malinhvuc'];

            ?>
            <div class="col-1" >
              <button type="button" class="btn btn-warning"> <?php echo $row_cate_home['tenlinhvuc']  ?></button>
              </div>
            <?php
               }
            ?>
            </div>
            </div>
        </div>
    </div>
    <!-- Danh Muc Hot -->
    <!-- Cua Hang Noi Bat -->
    <div class="container mb-5 mt-3">
      <div class="row">
          <div class="col-9 shadow-lg p-3 mb-5 bg-body rounded" style="margin-right:30px;" >
            
              
              
                  <?php 
                    $sql_cate_home=mysqli_query($con,'SELECT * FROM linhvucmuaban');
                    while($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
                      $id_danhmuc=$row_cate_home['malinhvuc'];

                  ?>
                  
                
                  
                    <button type="button" class="btn btn-outline-warning"> Cửa Hàng <?php echo $row_cate_home['tenlinhvuc']  ?></button>
                    <div class="row  mb-5">
                      <?php 
                        $sql_product=mysqli_query($con, 'SELECT * FROM linhvucmuaban,cuahang WHERE cuahang.malinhvuc=linhvucmuaban.malinhvuc AND new=1 ');
                        while($row_product=mysqli_fetch_array($sql_product)){
                          if($row_product['malinhvuc']==$id_danhmuc){
                      ?>
                      
                      
                            <div class="col-3 mt-3" >
                                <div class="card " style="width: 12rem;margin-left: 20px;" style="float:left">
                                  <img src="image/<?php echo $row_product['hinhcuahang'] ?> "  class="card-img-top img-fluid" alt="sp_1">
                                  <div class="card-body">
                                  <span class="card-title"><a href="cuahang.php" style="text-decoration:none;" class="text-dark fs-6"><?php echo $row_product['tencuahang'] ?></a></span>
                                  <hr>
                                  <a href="cuahang.php?id=<?php  echo $row_product['macuahang'] ?>" class="btn btn-warning"><i class="fa-solid fa-gears"></i> Xem cửa hàng</a>
                                  <span class="card-title" style="font-size:10px"><i class="fa-solid fa-location-dot"></i>  <?php echo $row_product['diachi'] ?></span>
                                  </div>
                                </div>
                            </div>

                      <?php 
                          }
                    
                        }
                        
                  ?>
                  <a href="linhvuc.php?malinhvuc=<?php echo $row_cate_home['malinhvuc']?> " style="margin-left: 400px;text-decoration:none;" ><span >Xem thêm</span></a>
                    </div>
                      <?php 
                        }
                      ?>
                     
                      
              
         
           
            <?php
            
            ?>
        </div>


        <div class="col-2" style="float:left;width:280px">
                <div class="row shadow-lg p-3 mb-5 bg-body rounded" style="width:100%">
                     <div >
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalGianHang" style="width:100%">
                      <i class="fa-solid fa-user"></i> Tạo Gian Hàng
                    </button>
                    <form class="form-inline" method="POST" style="float:left" enctype="multipart/form-data">
                    <div class="modal fade" id="ModalGianHang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content bg-light" style="color:red;">
                            <div class="modal-header">
                              <div style="width:100%;color:crimson;font-weight: bold;">Tạo Gian Hàng</div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="form text-success">
                              <div class="row">
                                  <div class="col-6 mr-5">
                                  <input type="text" class="form-control" name="txttencuahang" id="txttencuahang" placeholder="Tên Cửa Hàng" style="width:200px" />
                                  </div>
                                  <div class="col-6 ml-3">
                                  <input type="file" class="form-control" name="hinhanh" style="width:200px"/><br>                     
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-6 mr-5">
                                  <input type="text" class="form-control" name="hotenquanly" id="hotenquanly" placeholder="Tên Chủ Shop" style="width:200px" />
                                  </div>
                                  <div class="col-6 ml-3">
                                  <input type="text" class="form-control" name="txtsodienthoai" id="txtsodienthoai" placeholder="Số Điện Thoại" style="width:200px"/>
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-6 mr-5">
                              
                                      <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="email" style="width:200px"/>
                                  </div>

                                  <div class="col-6">
                                      <input type="text" class="form-control" name="txtmatkhau" id="txtmatkhau" placeholder="mật khẩu" style="width:200px" /><br>
                                  </div>
                              </div>
                             
                              <?php 
                                $sql_linhvuc=mysqli_query($con,"SELECT * FROM linhvucmuaban ORDER BY malinhvuc DESC");
                              ?>
                                <select name="sllinhvuc" class="form-control">
                                    <option value="0">--Chọn lĩnh vực--</option>
                                    <?php 
                                        while($row_linhvuc=mysqli_fetch_array($sql_linhvuc)){
                                    ?>
                                        <option value="<?php echo $row_linhvuc['malinhvuc'] ?>"> <?php echo $row_linhvuc['tenlinhvuc'] ?> </option>
                                    <?php 
                                    }
                                    ?>
                                </select><br>
                                 <input type="text" class="form-control" name="diachicuahang" id="diachicuahang" placeholder="Địa Chỉ" /><br>
                            
                                <button class="btn btn-warning" name="taogianhang">Đăng Ký</button><br><br>
                                   Bạn đã có tài khoản? <button class="btn btn-warning" type="button" id="btndangnhap">Đăng Nhập</button>
                              </div>
                        </div>
                    </div>
                  </div>
                </div>     
              </div>
            </form>
            
          <div>
          <hr>
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
                       
                         
            </div>
          </div>
                    
      </div>

    </div>   
</div>
    <!-- Cua Hang Noi Bat -->
<?php
  include('footer.php')
?>
</body>
</html>