<div class="container-fluid">
<?php 
    $sql_linhvuc=mysqli_query($con,'SELECT * FROM linhvucmuaban ORDER BY malinhvuc DESC')
  ?>
  <?php 
      $sql_danhmuc=mysqli_query($con,'SELECT * FROM loaihanghoa ORDER BY maloaihang DESC');
  ?>
        <!-- nav start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <div class="container-fluid mt-2">
              <a class="navbar-brand" href="index.php" >Trang chủ</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="gioithieu.php">Giới thiệu</a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="donhang.php">Đơn Hàng</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="tintuc.php">Tin Tức</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="hotro.php">Hỗ Trợ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="giohang.php">Giỏ Hàng</a>
                  </li>
                  <!-- linhvucmuaban -->
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Lĩnh vực mua bán
                    </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php 
                    while($row_linhvuc=mysqli_fetch_array($sql_linhvuc)){
                  ?>
                  <li><a class="dropdown-item" href="linhvuc.php?malinhvuc=<?php echo $row_linhvuc['malinhvuc'] ?>"><?php echo $row_linhvuc['tenlinhvuc'] ?></a></li>
                  <?php
                    }
                  ?>
                 </ul>
                 </li>
                  <!-- linhvucmuaban -->
                  <form class="d-flex" action="timkiem.php" method="POST" style="margin-left: 30px;">
                    <input class="form-control me-2" type="search" name="search_product" placeholder="Search" aria-label="Search" style="width: 400px;">
                    <button class="btn btn-outline-success btn-danger text-light" name="search_button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </form>
                </ul>
                
              </div>
             <div>
              <li class="nav-item dropdown" style="list-style-type: none;">
                <?php 
                      if(isset($_SESSION['dangnhap_home'])) {
                    
                ?>
                <div >
                      <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                      <?php echo $_SESSION['dangnhap_home']?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="taikhoankhachhang.php">Cập Nhật</a>
                        <a class="dropdown-item" href="?account=dangxuat">Đăng Xuất</a>
                      </div>
                </div>
                </li>
                </div>
               <?php
                   }else{
              ?> 
     
              <form class="form-inline" method="POST" style="float:left">
              <div>
                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-warning" data-bs-toggle="modal" data-bs-target="#ModalDangKy" style="margin-left: 5px;">
                  <i class="fa-solid fa-user"></i> Đăng Ký
                  </button>
                <!-- Button trigger modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="ModalDangKy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-light" style="color:red;">
                        <div class="modal-header">
                                <div style="text-align:center; width:100%;color:crimson;font-weight: bold;">Đăng Ký</div>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                      <div class="form text-success">
                          <div class="row">
                          <!-- Họ Tên: <br> -->
                            <div class="col-6 mr-5">
                            <input type="text" class="form-control" name="txtTenDangNhap" id="txtTenDangNhap" placeholder="Họ Tên" style="width:200px" />
                            </div>
                            <div class="col-6 ml-3">
                            <!-- Số Điện Thoại: <br> -->
                            <input type="text" class="form-control" name="txtSDT" id="txtSDT" placeholder="Số Điện Thoại" style="width:200px"/>
                            </div>
                          </div><br>
                          <div class="row">
                              <div class="col-6 mr-5">
                          <!-- Email: <br> -->
                                <input type="text" class="form-control" name="email" id="email" placeholder="email" style="width:200px"/>
                              </div>
                              <div class="col-6">
                          <!-- Mật Khẩu:  -->
                          <input type="text" class="form-control" name="txtmatkhau" id="txtmatkhau" placeholder="mật khẩu" style="width:200px" /><br>
                              </div>
                           </div>
                          <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa Chỉ" /><br>
                          
                          <button class="btn btn-warning" name="dangky">Đăng Ký</button><br>
                          Bạn đã có tài khoản? <button class="btn btn-warning" type="button" id="btndangnhap">Đăng Nhập</button>
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                   </form>
                   <form class="form-inline" method="POST" style="float:left">
                  <!-- Button trigger modal -->
                <!-- button dang nhap -->
               
                <button type="button" class="btn btn-primary btn-warning" data-bs-toggle="modal" data-bs-target="#ModalDangNhap">
                <i class="fa-solid fa-right-to-bracket"></i> Đăng Nhập
                </button>
                <!-- button dang nhap -->
                <!-- Modal dang nhap -->
                <div class="modal fade" id="ModalDangNhap" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-light">
                        <div class="modal-header">
                                <div style="text-align:center; width:100%;color:crimson;font-weight: bold;">Đăng Nhập</div>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="form-floating">
                                <input type="text" class="form-control" name="txtemail" id="txtemail" style="height:50px" placeholder="Email">
                                <label for="floatingInput">Email</label>
                        <div class="form-floating mt-3">
                                <input type="password" class="form-control"  name="txtmatkhau" id="txtMatKhau" placeholder="Password" style="height:50px">
                                <label for="floatingPassword">Password</label><br>
                                <button class="btn btn-warning" name="dangnhap_home">Đăng Nhập</button><br>
                                 Bạn chưa có tài khoản? 
                            <button class="btn btn-warning" type="button" id="btndangky">Đăng Ký</button>
                        </div>

                        </div>
                      </div>
                    </div>
                  </div>
     
              </div>
              <!-- modal dang nhap -->
              </form>
              <?php
                    }
              ?>
            </div>
          </nav>
        <!-- nav finish -->
    </div>