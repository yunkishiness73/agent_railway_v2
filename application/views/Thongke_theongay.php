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
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include('navbar.php'); ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="jumbotron" style="padding: 2rem 1rem;">
                               <h2 style="text-transform: uppercase; text-align: center; color: #6f42c1;">Thống kê doanh thu theo ngày</h2>
                           </div>
                           <div style="width: 100%;">
                            <canvas id="myChart"></canvas>
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <?php include('footer.php'); ?>
        <?php include('Digital_Block.php'); ?>
        
    </div>
</div>  <!-- end wrapper -->

</body>
<?php include('bottom.php'); ?>
<script src="<?= base_url() ?>Chart.js/dist/Chart.min.js"></script>
<script>

 
 $(function() {

    data = JSON.parse('<?= $data ?>');

    day= [];
    total = [];

    for(i in data) {
    
        total.push(data[i].tong_tien);
        day.push(
            'Ngày ' + data[i].ngay + '\n' +
            '- Số lượng ' + data[i].so_luong
        );

    }

    var data = {

          labels : day,
          datasets: [
          {

            label: 'Tổng doanh thu',
            backgroundColor: '#ff6b81',
            borderColor: '#ff6b81',
            borderWidth: '3',
            fill: false,
            data: total,
          },
          {
            label: 'Số lượng đơn',
            backgroundColor: '#ff6b81',
            borderColor: '#ff6b81',
            borderWidth: '3',
            fill: false,
            data: day,
          }
          ]

        };

        var ctx = $('#myChart');
        var barGraph = new Chart(ctx, {
          type: 'line',
          data: data
        });



});

</script>
</html>