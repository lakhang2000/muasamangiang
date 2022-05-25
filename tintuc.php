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
    <div class="container">
          <div class="row mt-5">
                    
        <div class="col-4" style="float:left;margin-right: 60px;">
                <div class="row">
                     <div >
                         <div class="row">
                              <span class="fs-2"> <i class="fa-solid fa-house fs-1"></i>  Chợ Việt</span>
                              <div class="shadow-lg p-3 mb-3 bg-body rounded"><i class="fa-solid fa-truck"></i> Vận chuyển nhanh</div>
                              <div class="shadow-lg p-3 mb-3 bg-body rounded" ><i class="fa-solid fa-sack-dollar"></i>   Giả cả ưu đãi</div>
                              <div class="shadow-lg p-3 mb-3 bg-body rounded" ><i class="fa-solid fa-comment-sms"></i> Tư vấn tận tình</div>
                              <div class="shadow-lg p-3 mb-3 bg-body rounded"><i class="fa-solid fa-bread-slice"></i>  Đa dạng mẫu mã</div>
                              
                              <hr>

                         </div>
                         <div class=" row shadow-lg p-3 mb-5 bg-body rounded">
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

                    <div class="col-7 shadow-lg p-3 mb-3 bg-body rounded">
                        <span class="text-danger fs-3">Tin Mới *</span>
                        <?php
                            $sql_tintuc=mysqli_query($con, "SELECT * FROM tintuc,cuahang WHERE tintuc.macuahang=cuahang.macuahang"); 
                        ?>

                        <?php 
                          $i=0;
                          while($row_tintuc=mysqli_fetch_array($sql_tintuc)){
                              $i++;
                        ?>
                              <div class="card mt-3">
                                <div class="card-header">
                                <h5 class="card-title"><?php echo $row_tintuc['tieude'] ?></h5>
                                </div>
                                <div class="card-body">                                  
                                  <img src="image/<?php echo $row_tintuc['hinhanh'] ?>" class="card-img-top img-fluid" alt="sp_1">
                                  <p class="card-text"><?php echo $row_tintuc['noidung'] ?></p>
                                  <span><?php echo $row_tintuc['ngaythang'] ?> </span><span><?php echo $row_tintuc['tencuahang'] ?></span>
                                </div>
                            </div>
                            <hr>
                        <?php
                          }
                        ?>
                    </div>
          </div>
          
    </div>
   <?php
    include('footer.php')
   ?>
</body>
</html>