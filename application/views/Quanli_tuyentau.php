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
            <div class="col-sm-12">

             <div class="jumbotron" style=" padding: 2rem 1rem; width: 60%; margin: auto;">
               <div style="font-size: 30px; text-align: center;">QUẢN LÝ TUYẾN TÀU</div>
             </div>
             <table class="table" style="width: 50%; margin: auto;">
              <thead>
                <tr>
                  <th style="">Tuyến</th>
                </tr>
              </thead>
              <tbody class="add-menu-view">

               <?php foreach ($route as $value): ?>
                <tr >
                  <td style=""><?= $value['ten_tuyen'] ?></td>
                  <td>
                  <a data-href="<?= $value['id'] ?>" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px;"><i class="fa fa-remove"></i></a>
                </td>
              </tr>                 
              <?php endforeach ?>

            </tbody>
          </table>

        </div>  <!-- end left content-->

      </div>
    </div>
  </div>
  <!-- End Navbar -->

  <?php include('footer.php'); ?>
  <?php include('Digital_block.php') ?>
</div>
</div>

</body>
<?php include('bottom.php'); ?>
</html>