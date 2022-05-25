<?php 
  include("db/connect.php")
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
          <div class="col-3">
          <?php 
            if(isset($_GET['id'])){
              $id=$_GET['id'];
            }
            else{
              $id='';
            }
            $sql_tencuahang=mysqli_query($con,"SELECT tencuahang FROM loaihanghoa,cuahang WHERE loaihanghoa.macuahang=cuahang.macuahang AND cuahang.macuahang='$id'");
            $row_tencuahang=mysqli_fetch_array( $sql_tencuahang);
            $ten=$row_tencuahang['tencuahang'];
        ?>
            <button type="button" class="btn btn-outline-danger text-center"><i class="fa-solid fa-house"></i> <?php echo $ten ?></button>
          </div>
          <div class="col-9">
          </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
        <?php 
        if(isset($_GET['id'])){
          $id=$_GET['id'];
        }
        else{
          $id='';
        }
        $sql_cate_home=mysqli_query($con,"SELECT * FROM loaihanghoa,cuahang WHERE loaihanghoa.macuahang=cuahang.macuahang AND cuahang.macuahang='$id'");
        while($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
        $id_danhmuc=$row_cate_home['maloaihang'];
        ?>
        <div class="col-1" >
              <button type="button" class="btn btn-warning"> <?php echo $row_cate_home['tenloaihang']  ?></button>
        </div>
        <?php
               }
        ?>
        </div>
        </div>
      </div>
    </div>
    <div class="container mb-5 mt-5">
        <div class="row ">
            <div class="col-9 shadow-lg p-3 mb-5 bg-body rounded" style="margin-right:30px;background-color: #E6E6FA;" >
                                       <?php 
                                         
                                          if(isset($_GET['id'])){
                                            $id=$_GET['id'];
                                          }
                                          else{
                                            $id='';
                                          }
                                          $sql_cate_home=mysqli_query($con,"SELECT * FROM loaihanghoa,cuahang WHERE loaihanghoa.macuahang=cuahang.macuahang AND cuahang.macuahang='$id'");
                                          while($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
                                            $id_danhmuc=$row_cate_home['maloaihang'];

                                        ?>
        
                              <!-- <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">                               -->
                                
                                <button type="button" class="btn btn-outline-warning mt-3">Mẫu <?php echo $row_cate_home['tenloaihang']  ?></button>
                                <div class="row mt-1">
                                  <?php 
                                    $sql_product=mysqli_query($con, 'SELECT * FROM hanghoa ORDER BY mahanghoa ASC');
                                    while($row_product=mysqli_fetch_array($sql_product)){
                                      if($row_product['maloaihang']==$id_danhmuc){
                                  ?>
                                  
                                  <div class="col-md-3 shadow-lg p-3 bg-body rounded mt-2">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                      <div class="men-thumb-item text-center">
                                      <img src="image/<?php echo $row_product['hinhhanghoa'] ?> " style="height:200px;" class="card-img-top img-fluid" alt="sp_1">
                  
                                        

                                      </div>
                                      <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                         <?php echo $row_product['tenhanghoa']?>
                                        </h4>
                                        <div class="info-product-price my-2">
                                          <button class="btn btn-outline-warning"><?php echo $row_product['giagoc']?>đ</button>
                                          <a href="chitietsanpham.php?id=<?php  echo $row_product['mahanghoa'] ?>" class="btn btn-warning"><i class="fa-solid fa-gears"></i> Chi Tiết</a>
                                          
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <?php 
                                    }
                                  }
                                  ?>
                                <!-- </div> -->
                                
                              </div>
                            
                              <?php 
                                }
                              ?>
                              
                           <!-- a -->
            </div>

            <div class="col-2" style="float:left;width:280px">
                <div class="row">
                     <div class="shadow-lg p-3 mb-5 bg-body rounded">
                         <div class="row">
                              <div class="col-12 text-danger">Hộp Thư Góp Ý <span class="text-danger">*</span></div><br><br>
                              <div><input type="text" class="form-control" name="txtbaocao" id="txtbaocao"/></div>
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
                              <span class="mb-3 text-danger">Danh mục sản phẩm</span>                               
                                <ul style="list-style-type: none;">
                                  <?php
                                    if(isset($_GET['id'])){
                                      $id=$_GET['id'];
                                    }
                                    else{
                                      $id='';
                                    }
                                    $sql_sidebar=mysqli_query($con,"SELECT * FROM loaihanghoa,cuahang WHERE loaihanghoa.macuahang=cuahang.macuahang AND cuahang.macuahang='$id'");
                                    ?>
                                    
                                      <?php
                                    while($row_danhmuc_sidebar = mysqli_fetch_array($sql_sidebar)) {
                                  ?>
                                    <li>                                    
                                      <span class="span"> <a href="danhmuc.php?danhmuc=<?php echo $row_danhmuc_sidebar['maloaihang'] ?>" style="text-decoration:none">Mẫu <?php echo $row_danhmuc_sidebar['tenloaihang'] ?></a></span>
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
    </div>
    <?php
    include('footer.php')
   ?>
</body>
</html>