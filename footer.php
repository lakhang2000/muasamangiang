<script src="Thuvien/bootstrap/js/bootstrap.js"></script>
    <script src="Thuvien/jquery/jquery.js"></script>
    <script src="Thuvien/js/bootstrap.js"></script>
      <script>
      $(function(){
        $('#btndangky').click(function(e){
          $('#ModalDangNhap').modal('hide');
          $('#ModalDangKy').modal('show');

        })
        $('#btndangnhap').click(function(e){
          $('#ModalDangKy').modal('hide');
          $('#ModalDangNhap').modal('show');

        })
        $('#btngianhang').click(function(e){
          $('#ModalGianHang').modal('show');

        })
        $('#btnthanhtoan').click(function(e){
          $('#Modalthanhtoan').modal('show');

        })
        $('#thanhtoanlogin').click(function(e){
          $('#Modalthanhtoanlogin').modal('show');

        })
      })
  </script>