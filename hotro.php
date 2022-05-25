<?php
  include('login.php')
?>
<?php
    include('db/connect.php')
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
            
            <div class="col-3 mt-3">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <h5 class="card-title">Báo cáo sự cố</h5><br>
                        <form name="frbaocaosuco" action="" method="POST">
                        <label>Nhập nội dung <span class="text-danger">*</span></label><br><br>
                        <input type="text" class="form-control" name="txtbaocao" placeholder="text"/><br>
                        <input type="submit"  name="thembaocao" value="Gửi" class="btn btn-warning"/>
                        </form>
                </div>
            </div>

            <div class="col-9 mt-3">
                <!-- <div class="card" style="border-radius: 20px;"> -->
                    <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <h6 style="text-align: center; color:brown">Danh Sách Hotline Hỗ Trợ Khách Hàng</h6>
                        <hr>
                    <?php
                        $sql_lienhe=mysqli_query($con, "SELECT * FROM cuahang,quanly WHERE cuahang.ID_quanly=quanly.ID_quanly ORDER BY macuahang ASC"); 
                    ?>
                        <table class="table" ui-jq="footable" ui-options='{
                            "paging": {
                            "enabled": true
                            },
                            "filtering": {
                            "enabled": true
                            },
                            "sorting": {
                            "enabled": true
                            }}'>
                            <thead>
                            <tr>
                                <th data-breakpoints="xs">Số Thứ Tự</th>
                                <th>Tên Cửa Hàng</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=0;
                                    while($row_lienhe=mysqli_fetch_array($sql_lienhe)){
                                        $i++;
                                ?>
                                    <tr data-expanded="true">
                                        <td><?php echo $i ?> </td>
                                        <td><?php echo $row_lienhe['tencuahang'] ?></td> 
                                        <td><?php echo $row_lienhe['diachi'] ?></td>
                                        <td><?php echo $row_lienhe['sodienthoai'] ?></td>             
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                <!-- </div> -->
            </div>
            
        </div>
    </div>

    <?php
    include('footer.php')
   ?>
</body>
</html>