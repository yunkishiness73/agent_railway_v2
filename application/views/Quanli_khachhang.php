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
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header">
                                    <h2 class="card-title">Thông tin khách hàng</h2>
                                </div>
                                <div class="card-body table-full-width table-responsive" style="text-align: center">
                                    <table class="table table-hover table-striped" >
                                        <thead>
                                            <th style="font-size: 16px; text-align: center !important;">Stt</th>
                                            <th style="width: 10%; font-size: 16px; text-align: center !important; " >Id</th>
                                            <th style="width: 20%; font-size: 16px; text-align: center !important;">Name</th>
                                            <th style="width: 20%; font-size: 16px; text-align: center !important;">Email</th>
                                            <th style="width: 15%; font-size: 16px; text-align: center !important;">Account Number</th>
                                            <th style="width: 15%; font-size: 16px; text-align: center !important;">Phone Number</th>
                                            <th style="width: 20%; font-size: 16px; text-align: center !important;"></th>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1; ?>
                                            <?php foreach ($customer as $value): ?>           
                                                <tr>
                                                    <td><?= $count++; ?></td>
                                                    <td><?= $value['cmnd'] ?></td>
                                                    <td><?= $value['ten_khach_hang'] ?></td>
                                                    <td><?= $value['email'] ?></td>
                                                    <td><?= $value['account_number'] ?></td>
                                                    <td><?= $value['sdt'] ?></td>
                                                    <td>
                                                        <a data-href="<?= $value['id'] ?>" class="btn btn-info"><i class="fa fa-info"></i> </a>
                                                        <a data-href="<?= $value['id'] ?>" class="btn btn-warning" style="margin-left: 7%"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <!-- footer -->
                <?php include('footer.php'); ?>
                <?php include('Digital_Block.php'); ?>
            <!-- end footer -->
        </div>
    </div>

</body>
<?php include('bottom.php'); ?>
</html>