<?php include('checkLoginStatus.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include('head.php') ?>

  <style>

    body { font-family: Helvetica }

  </style>

</head>


<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <?php include('sidebar.php') ?>
    <!-- End Sidebar -->
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('navbar.php') ?>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <!-- left content block -->
            <div class="col-sm-9">

             <div class="jumbotron" style="padding: 2rem 1rem;">
               <div style="font-size: 35px; text-align: center; text-transform: uppercase;">Sửa - Xóa hành trình</div>
             </div>
             <div class="table-responsive">



               <table class="table">
                <thead>
                  <tr>
                    <th style="">Tên tuyến</th>
                    <th style="">Tàu</th>
                    <th style="">Ngày khởi hành</th>
                    <th style="">Giờ khởi hành</th>
                    <th style="">Ngày đến</th>
                    <th style="">Giờ đến</th>
                    <th style="">Giá vé</th>
                    <th style=""></th>
                  </tr>
                </thead>
                <tbody >
                  <?php foreach ($journeys as $value): ?>

                   <tr>
                    <td style="" class="">
                      <span><?= $value['ten_tuyen'] ?></span>
                    </td>
                    <td style="">
                      <span class="hide-view"><?= $value['ten_tau'] ?></span>
                      <select class="form-control sua-ten-tau show-select" style="display: none;">
                        <?php foreach ($train as $val): ?>
                          <option value="<?= $val['id'] ?>"><?= $val['ten_tau'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td style="">
                      <span class="hide-view"><?= $value['ngay_khoi_hanh'] ?></span>
                      <input type="text" class="show-select sua-ngay-di form-control datepicker" value="<?= $value['ngay_khoi_hanh'] ?>" placeholder="Chọn ngày khởi hành *" style="display: none;">
                    </td>
                    <td style="">
                      <span class="hide-view"><?= $value['gio_khoi_hanh'] ?></span>
                      <input type="time" class="show-select sua-gio-di form-control" value="<?= $value['gio_khoi_hanh'] ?>" placeholder="Chọn giờ đi *" style="display: none;">
                    </td>
                    <td style="">
                      <span class="hide-view"><?= $value['ngay_den'] ?></span>
                      <input type="text" class="show-select sua-ngay-den form-control datepicker" value="<?= $value['ngay_den'] ?>" placeholder="Chọn ngày đến *" style="display: none;">
                    </td>
                    <td style="">
                      <span class="hide-view"><?= $value['gio_den'] ?></span>
                      <input type="time" class="show-select sua-gio-den form-control" value="<?= $value['gio_den'] ?>" placeholder="Chọn giờ đến *" style="display: none;">
                    </td>
                    <td style="">
                      <span class="hide-view"><?= $value['gia_ve'] ?></span>
                      <input type="text" class="show-select sua-gia form-control" value="<?= $value['gia_ve'] ?>" placeholder="Giá tiền *" style="display: none;">
                    </td>
                    <td style="">
                     <a data-href="<?= $value['id'] ?>" class="btn btn-warning btn-edit-trip" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                     <a data-href="<?= $value['id'] ?>" class="btn btn-danger btn-remove-trip" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
                     <a data-href="<?= $value['id'] ?>" class="btn btn-success btn-save-change"  style="display: none;"><i class="fa fa-floppy-o"></i></a>
                   </td>
                 </tr>    

               <?php endforeach ?>
             </tbody>
           </table>
         </div>
       </div>  <!-- end left content-->


       <!-- right content block -->

       <div class="col-sm-3">
        <div class="jumbotron" style="padding: 2rem 1rem;">
          <div style="font-size: 35px; text-align: center; text-transform: uppercase;">Thêm hành trình</div>
        </div>

        <!-- form thêm hành trình -->
        <form action="">
         <div class="row">

           <div class="col-sm-4" style="margin-top: 15px;"><label>Tên tuyến</label></div>
           <div class="col-sm-8"> 
             <select class="form-control ten-tuyen">
              <?php foreach ($route as $value): ?>
               <option value="<?= $value['id'] ?>"><?= $value['ten_tuyen'] ?></option>
             <?php endforeach ?>
           </select>
         </div>
       </div>
       <div class="row">
        <div class="col-sm-4" style=" margin-top: 15px;">
          <label>Ngày khởi hành</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control datepicker ngay-khoi-hanh" placeholder="Chọn ngày khởi hành *" >
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" style=" margin-top: 15px;">
          <label>Giờ khởi hành</label>
        </div>
        <div class="col-sm-8">
          <input type="time" class="form-control gio-khoi-hanh" value="" placeholder="Chọn giờ khởi hành *">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" style=" margin-top: 15px;">
          <label>Ngày đến</label>
        </div>
        <div class="col-sm-8">
         <input type="text" class="form-control datepicker ngay-den" value="" placeholder="Chọn ngày đến *">
       </div>
     </div>
     <div class="row">
      <div class="col-sm-4" style=" margin-top: 15px;">
        <label>Giờ đến</label>
      </div>
      <div class="col-sm-8">
        <input type="time" class="form-control gio-den" value="" placeholder="Chọn giờ đến *">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4" style=" margin-top: 15px;">
        <label>Tàu</label>
      </div>
      <div class="col-sm-8">
        <select class="form-control ten-tau">
          <?php foreach ($train as $value): ?>
            <option value="<?= $value['id'] ?>"><?= $value['ten_tau'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4" style=" margin-top: 15px;">
        <label>Giá vé</label>
      </div>
      <div class="col-sm-8">
        <input type="text" class="form-control gia-ve" value="" placeholder="Giá vé *">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12" style="text-align: center; margin-top: 15px;">
       <input type="submit" class="btn btn-info them-hanh-trinh" value="Thêm Hành Trình">
       <input type="reset" class="btn btn-warning huy-hanh-trinh" value="Hủy bỏ">
     </div>
   </div>
 </form> <!-- end form thêm hành trình -->

</div> <!-- end right content block -->
</div>

</div>
</div>

<!-- Start footer -->

<?php include('footer.php') ?>
<?php include('Digital_block.php') ?>

<!-- End footer -->
</div>
</div>

</body>

<?php include('bottom.php') ?>

<script>

  function validateDateTime(sDatetime, eDatetime) {

    date = new Date();
    d = date.getDate();
    m = date.getMonth() + 1;
    y = date.getFullYear();
    h = date.getHours();
    min = date.getMinutes();

    currDate = y + '-' + m + '-' + d + ' ' + h + ":" + min;



    src = Date.parse(sDatetime);
    dest = Date.parse(eDatetime);

    interval_1 = src - Date.parse(currDate);
    interval_2 = dest - src;

    if(interval_1 < 7200000) {
      alert('- Ngày khởi hành phải cùng hoặc sau ngày hiện tại !' + '\n' + '- Giờ khởi hành phải sau giờ hiện tại 2 tiếng');
      return false;
    }

    if(interval_2 < 3600000) {
      alert('- Ngày đến phải cùng hoặc sau ngày hiện tại !' + '\n' + '- Giờ đến phải sau giờ khởi hành 1 tiếng');
      return false;
    }

    return true;
  }

  $(function() {

    path = '<?= base_url(); ?>';

    $('body').on('click', '.btn-edit-trip', function(event) {

      //ẩn nút sửa - xóa
      $(this).hide();
      $(this).next().hide();

      // hiện nút lưu
      $(this).next().next().show();

      //ẩn thẻ span 
      $(this).parent().prev().find('.hide-view').hide();
      $(this).parent().prev().prev().find('.hide-view').hide();
      $(this).parent().prev().prev().prev().find('.hide-view').hide();
      $(this).parent().prev().prev().prev().prev().find('.hide-view').hide();
      $(this).parent().prev().prev().prev().prev().prev().find('.hide-view').hide();
      $(this).parent().prev().prev().prev().prev().prev().prev().find('.hide-view').hide();
      $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.hide-view').hide();

      //hiện thẻ input 
      $(this).parent().prev().find('.show-select').show();
      $(this).parent().prev().prev().find('.show-select').show();
      $(this).parent().prev().prev().prev().find('.show-select').show();
      $(this).parent().prev().prev().prev().prev().find('.show-select').show();
      $(this).parent().prev().prev().prev().prev().prev().find('.show-select').show();
      $(this).parent().prev().prev().prev().prev().prev().prev().find('.show-select').show();
      $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.show-select').show();


      //reset lại trạng thái các ô input
      // $('.sua-ten-tau option:selected').val('');
      // $('.sua-ngay-di').val('');
      // $('.sua-gio-di').val('');
      // $('.sua-ngay-den').val('');
      // $('.sua-gio-den').val('');
      // $('.sua-gia').val('');

      
    });

    $('body').on('click', '.btn-save-change', function(event) {


      console.log($('.sua-ten-tau option:selected').val());
      console.log($('.sua-ngay-di').val());
      console.log($('.sua-gio-di').val());
      console.log($('.sua-ngay-den').val());
      console.log($('.sua-gio-den').val());
      console.log($('.sua-gia').val());

      _id = $(this).data('href');
      _id_tau = $(this).parent().prev().prev().prev().prev().prev().prev().find('.sua-ten-tau option:selected').val();
      _ngaykhoihanh = $(this).parent().prev().prev().prev().prev().prev().find('.sua-ngay-di').val();
      _giokhoihanh = $(this).parent().prev().prev().prev().prev().find('.sua-gio-di').val();
      _ngayden = $(this).parent().prev().prev().prev().find('.sua-ngay-den').val();
      _gioden =  $(this).parent().prev().prev().find('.sua-gio-den').val();
      _giave =  $(this).parent().prev().find('.sua-gia').val();


      console.log('------------');
      console.log(_id);
      console.log(_id_tau);
      console.log(_ngaykhoihanh);
      console.log(_giokhoihanh);
      console.log(_ngayden);
      console.log(_gioden);
      console.log(_giave);

       //cờ hiệu
       flag = false;

       if(_ngaykhoihanh == '' || _giokhoihanh == '' || _gioden == '' || _ngayden == '' || _giave == '') {    
        alert('Bạn chưa nhập đầy đủ thông tin hành trình !');
        flag = true; //thông tin không đầy đủ cờ hiệu bật thành true
      }

      /*kiểm tra giá vé có hợp lệ không?*/
      if(isNaN(_giave) || parseInt(_giave) <= 0) {
       alert('Giá vé bạn nhập không hợp lệ!');
       flag = true;
     } 


     // thêm chi tiết hành trình
     if(flag == false) {

      sDatetime = _ngaykhoihanh + ' ' + _giokhoihanh;
      eDatetime = _ngayden + ' ' + _gioden;

      // kiểm tra tính hợp lệ của ngày giờ khởi hành và ngày giờ đến 
      result = validateDateTime(sDatetime, eDatetime);

      if(result == true) {

         // ẩn nút lưu
         $(this).hide();

      //hiện nút sửa - xóa
      $(this).prev().show();
      $(this).prev().prev().show();

      //hiện thẻ span 
      $(this).parent().prev().find('.hide-view').show();
      $(this).parent().prev().prev().find('.hide-view').show();
      $(this).parent().prev().prev().prev().find('.hide-view').show();
      $(this).parent().prev().prev().prev().prev().find('.hide-view').show();
      $(this).parent().prev().prev().prev().prev().prev().find('.hide-view').show();
      $(this).parent().prev().prev().prev().prev().prev().prev().find('.hide-view').show();
      $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.hide-view').show();


      //ẩn thẻ input
      $(this).parent().prev().find('.show-select').hide();
      $(this).parent().prev().prev().find('.show-select').hide();
      $(this).parent().prev().prev().prev().find('.show-select').hide();
      $(this).parent().prev().prev().prev().prev().find('.show-select').hide();
      $(this).parent().prev().prev().prev().prev().prev().find('.show-select').hide();
      $(this).parent().prev().prev().prev().prev().prev().prev().find('.show-select').hide();
      $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.show-select').hide();

      $.post(path + 'Admin_controller/editJourney', {id: _id, id_tau: _id_tau, gia_ve: _giave, ngay_khoi_hanh: _ngaykhoihanh, gio_khoi_hanh: _giokhoihanh, ngay_den: _ngayden, gio_den:  _gioden}, function(res) {
        if(res == 1) 
          alert('Sửa chi tiết hành trình thành công !');
          location.reload();
        });

    }


  }




});


    /*hiển thị datepicker*/
    $('.datepicker').datepicker({ 
      dateFormat: "yy-mm-dd"
    });

    // thêm hành trình
    $('body').on('click', '.them-hanh-trinh', function(event) {
      event.preventDefault();
      _id_tuyen = $('.ten-tuyen option:selected').val();
      _ngaykhoihanh = $('.ngay-khoi-hanh').val();
      _giokhoihanh = $('.gio-khoi-hanh').val();
      _ngayden = $('.ngay-den').val();
      _gioden = $('.gio-den').val();
      _id_tau = $('.ten-tau option:selected').val();
      _giave =  $('.gia-ve').val();

      //cờ hiệu
      flag = false;

      if(_ngaykhoihanh == '' || _giokhoihanh == '' || _gioden == '' || _ngayden == '' || _giave == '') {    
        alert('Bạn chưa nhập đầy đủ thông tin hành trình !');
        flag = true; //thông tin không đầy đủ cờ hiệu bật thành true
      }

      /*kiểm tra giá vé có hợp lệ không?*/
      if(isNaN(_giave) || parseInt(_giave) <= 0) {
       alert('Giá vé bạn nhập không hợp lệ!');
       flag = true;
     } 


     // thêm chi tiết hành trình
     if(flag == false) {

      sDatetime = _ngaykhoihanh + ' ' + _giokhoihanh;
      eDatetime = _ngayden + ' ' + _gioden;

      // kiểm tra tính hợp lệ của ngày giờ khởi hành và ngày giờ đến 
      result = validateDateTime(sDatetime, eDatetime);

      if(result == true) {

        $.post(path + 'Admin_controller/insertJourney', {id_tuyen: _id_tuyen, id_tau: _id_tau, gia_ve: _giave, ngay_khoi_hanh: _ngaykhoihanh, gio_khoi_hanh: _giokhoihanh, ngay_den: _ngayden, gio_den:  _gioden}, function(res) {
          if(res == 1) 
            alert('Thêm chi tiết hành trình thành công !');
          // location.reload();
        });

      }
    }










  });



  });

</script>






</html>