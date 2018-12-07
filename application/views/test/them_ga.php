<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url('quan_ly_ve_tau/them_ga'); ?>" method="POST">
        <label for="ten_ga">Tên Ga</label>
        <input id="ten_ga" name="ten_ga" type="text">
        <label for="khoang_cach">Khoảng cách so với TP.HCM</label>
        <input id="khoang_cach" name="khoang_cach" type="text">
        <label for="so_thu_tu">Số thứ tự ga</label>
        <input type="text" name="so_thu_tu" id="so_thu_tu">
        <input type="submit" value="Submit">
    </form>
</body>
</html>