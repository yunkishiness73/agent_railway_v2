<?php include('checkLoginStatus.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
    <style>
        .main-panel {
            background-image: url(<?= base_url() ?>/assets/img/train-1.jpg);
            background-size: cover;
            background-position: fixed;
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <?php include('sidebar.php'); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include('navbar.php'); ?>
            <!-- End Navbar -->
            <div class="content" style="padding: 0">
            
            </div>

            <?php include('footer.php'); ?>
            <?php include('Digital_block.php') ?>
        </div>
    </div>



</body>
<?php include('bottom.php') ?>
</html>