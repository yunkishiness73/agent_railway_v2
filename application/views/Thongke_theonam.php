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
                             <h2 style="text-transform: uppercase; text-align: center; color: #6f42c1;">Thống kê doanh thu theo năm</h2>
                         </div>
                         <div style="width: 100%">
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

       year= [];
       total = [];

       for(i in data) {

        total.push(data[i].tong_tien);
        year.push(
            'Năm ' + data[i].nam 
            );

    }

    var data = {

      labels : year,
      datasets: [
      {

        label: 'Tổng doanh thu',
        backgroundColor: '#4b7bec',
        hoverBackgroundColor: 'rgba(255,99,132,0.6)',
        hoverBorerColor: 'rgba(255,99,132,0.6)',
        borderWidth: '4',
        data: total
    }

    ]

};

var ctx = $('#myChart');
var barGraph = new Chart(ctx, {
  type: 'bar',
  data: data
});
});


</script>
</html>