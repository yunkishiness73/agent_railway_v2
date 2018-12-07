<?php include('checkLoginStatus.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('head.php'); ?>

 <style>

  body { font-family: Helvetica }

</style>

</head>

<body>
  <div class="wrapper">

   <?php include('sidebar.php'); ?>

   <div class="main-panel">
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- left content block -->
          <div class="col-sm-6">

           <div class="jumbotron">
             <div style="font-size: 35px; text-align: center; text-transform: uppercase;">Sửa - Xóa nhà ga</div>
           </div>
           <table class="table">
            <thead>
              <tr>
                <th colspan="2">Tên nhà ga</th>
                <th>Cự li </th>
                <th>Vị trí ga</th>
                
              </tr>
            </thead>
            <tbody class="add-menu-view">
              <?php foreach ($station as $value): ?> 
               <tr>
                <td colspan="2" style="width: 30%;">
                  <input type="text" class="ten-nha-ga form-control show-tg" value="<?= $value['ten_ga'] ?>" style="display: none;">
                  <span class="hidden-tg" ><?= $value['ten_ga'] ?></span>
                </td>
                <td style="width: 20%;">
                  <input type="text" class="cu-li form-control show-tg" value="<?= $value['khoang_cach'] ?>" style="display: none;">
                  <span class="hidden-tg "><?= $value['khoang_cach'] ?></span>
                </td>
                <td style="width: 20%;">
                  <input type="text" class="vi-tri form-control show-tg" value="<?= $value['so_thu_tu'] ?>" style="display: none;">
                  <span class="hidden-tg "><?= $value['so_thu_tu'] ?></span>
                </td>

                <td style="width: 20%;">
                 <a data-href="<?= $value['id'] ?>" class="btn btn-danger xoa-ga" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
                 <a data-href="<?= $value['id'] ?>" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
               </td>
             </tr>   
           <?php endforeach ?>
         </tbody>
       </table>

     </div>  <!-- end left content-->

     <!-- right content block -->
     <div class="col-sm-6">
      <div class="jumbotron">
        <div style="font-size: 35px; text-align: center; text-transform: uppercase;">Thêm nhà ga</div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th colspan="2">Tên nhà ga</th>
            <th>Cự li</th>
            <th>Vị trí ga</th>
          </tr>
        </thead>
        <tbody >

         <tr>
          <td colspan="2" class=""><input type="text" class="tenga form-control" value="" placeholder="Tên nhà ga *"></td>
          <td><input type="text" class="culi form-control" value="" placeholder="Cự li *"></td>
          <td><input type="text" class="vitri form-control" value="" placeholder="Vị trí nhà ga *"></td>
          <td ">
           <a data-href="" class="btn btn-success them-ga" style="display: inline-block; height: 34px; "><i class="fa fa-plus"></i></a>
         </td>
       </tr>      

     </tbody>
   </table>
 </div> <!-- end right content block -->

</div>
</div>
</div>
<!-- End Navbar -->

<?php include('footer.php'); ?>
<?php include('Digital_Block.php'); ?>
</div>
</div>

</body>
<?php include('bottom.php'); ?>
<script>
  $(function() {
    path = '<?= base_url(); ?>';

    $('.them-ga').click(function(event) {
      _tenga = $('.tenga').val();
      _culi= $('.culi').val();
      _vitri= $('.vitri').val();

      $.post(path + 'Admin_controller/insertStationByAjax', {ten_ga: _tenga, khoang_cach: _culi, so_thu_tu: _vitri }, function(res) {
        // if(res == 1) 
        //   alert('Thêm thành công!');
        // elseif(res == 0)
        // alert('Thêm thất bại!');

        location.reload();
      });
    });

    $('body').on('click', '.xoa-ga', function(event) {
      _tenga = $(this).parent().prev().prev().prev().find('.ten-nha-ga').val();
      e = confirm('Bạn có chắc muốn xóa ga ?');
      if(e == true) {
        $.post(path + 'Admin_controller/removeStationByAjax', {ten_ga: _tenga}, function(res) {
          if(res == 1)
            alert('Xóa thành công!');
          else
            alert('Xóa thất bại');
          location.reload();
        });
      }
      
    });
  });
</script>
</html>