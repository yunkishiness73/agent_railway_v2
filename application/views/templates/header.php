<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.min.css">

    <!-- Latest compiled JavaScript -->

    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>

    <script src="<?= base_url() ?>/assets/js/jquery-ui.min.js"></script>



    <style type="text/css">
    .container-box-book-ticket{
        position: relative;
        z-index: 1; 
        padding-bottom: 50px;
    }
    .container-box-book-ticket-bg {
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        content: "";
        position: absolute;
        background-image: url( "<?php echo base_url('public/background_image/background_0.jpg')?>");
        background-color: #cccccc;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1;
    }
    .box-book-ticket{
        width: 98%;
        padding-top: 5%;
        padding-left: 20px;
        margin: auto;
        margin-top: 7%;
        min-height: 60vh;
        background-color: rgba(0,0,0,0.6);
    }

    .autocomplete{
        display: inline-block;
        position: relative;
    }
    .autocomplete-items{
        background-color: #ffffff;
        padding: 10px;
        position: absolute;
        border: 1px solid DodgerBlue;
        margin-top: 20px;
        z-index: 99;
        width: 300%;
        height: 400%;
        overflow: auto;
    }

    .autocomplete-items div {
      padding: 5px;
      cursor: pointer;
      background-color: #fff;  
    }

    .autocomplete-items div:hover {
      /*when hovering an item:*/
      background-color: #4bbff4; 
    }

    .autocomplete-active {
    /*when navigating through the items using the arrow keys:*/
    background-color: DodgerBlue !important; 
    color: #ffffff; 
    }

    /* width */
    ::-webkit-scrollbar {
        width: 12px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px #491b59; 
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #491b59; 
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #3a1647; 
    }

    @media only screen and (max-width: 576px){
        /*.container-box-book-ticket{
            height: 100vh !important;
        }
        */
        .autocomplete-items{
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 992px){
        /*.container-box-book-ticket{
            height: 100vh !important;
        }
        */
        .autocomplete-items{
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 250px){
        /*.container-box-book-ticket{
            height: 100vh !important;
        }
        */ 
    }

    .route-info{
        font-size: 16px;
        font-weight: bold;
    }
    .container-depart-info{
        font-size: 18px;
        font-weight: bold;
    }
    .price-ticket{
        color: #d88820;
    }
    .size-image-logo{
        height: 30px;
        width: 40px;
    }
    .sub-info{
        font-size: 12px;
        border-top: 1px dotted #e0d0d0;
        border-bottom: 1px solid #e0d0d0;
    }
    .ghe{
        padding: 10px;
        border: 1px solid;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
    }
    .tau{
        max-height: 300px !important;
        overflow: auto;
    }
    .ghe-da-dat{
        background-color: #c61f1f;
    }
    .ghe-co-san{
        background-color: #ffffff;
    }
    .ghe-da-chon{
        background-color: #2bbf3f;    
    }
    .ghe-co-san:hover{
        background-color: #c1aaaa;
    }
</style>
</head>
<body>

	<?php $uri = $_SERVER['REQUEST_URI'];
      $uri = explode("/", $uri);
      $path = $uri[3].'/'.$uri[4];
      $path_payment = "payment/passenger_detail";
      if($path != $path_payment){
        unset($_SESSION['tickets']);
        unset($_SESSION['trang_thai']);
      }
    ?>

    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>
                </div>
            </div>
        </div>
    </div>
    <!--EndModalBox-->


    <!-- Modal Error Messege -->
<div class="modal fade" id="error-message-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="error-message-modal">Lỗi tìm kiếm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 id="content-error-message" class="text-danger"></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <nav class="navbar navbar-expand-xl navbar-dark bg-dark" style="width: 100%;">
                <a class="navbar-brand" href="#">Easy Book Ticket Railway</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample06">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Check Ticket</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown06">
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" href="#">Login</a>
                                <a class="dropdown-item" href="#">Create Account</a>
                                <a style="display: none;" class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Main Header --- Search Content-->
        <div class="row">
            <div class="col-sm-12 container-box-book-ticket">
                <div class="container-box-book-ticket-bg"></div>
                <div class="box-book-ticket">
                    <div class="row">
                        <div class="col-md-12 mb-2 text-center">
                            <h3 class="text-light">Vé Tàu Hỏa</h3>
                        </div>
                        <div class="col-md-12 mb-2">
                            <a href="#" class="text-warning"><i class="fa fa-eye"></i> Route Map</a>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check form-check-inline">
                                 <input type="radio" class="form-check-input" value="khu-hoi" id="type-ticket-khu-hoi" name="type-ticket" checked>
                                <label class="form-check-label text-light">Khứ Hồi</label>
                            </div>
                            <div class="form-check form-check-inline">   
                                <input type="radio" class="form-check-input" value="mot-chieu" id="type-ticket-mot-chieu" name="type-ticket">
                                <label class="form-check-label text-light">Một Chiều</label>
                            </div>
                        </div>
                    </div>
                    <form id="depart-info" action="<?php echo base_url('ve/booking'); ?>" method="POST">
                      <div class="form-row align-items-center">
                        <div class="col-lg-4 col-md-12 align-self-center">
                            <div class="row">
                                <div class="col-md-5 my-1 align-self-center">
                                    <label class="sr-only" for="input-noi-di">Nơi đi</label>
                                    <div class="autocomplete" id="group-input-noi-di">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <input autocomplete="off" type="text" class="form-control input-xs" id="input-noi-di" name="input-noi-di" placeholder="Nơi khởi hành">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <a id="swap-ga" href="javascript:void(0);"><i style="color: white;margin: auto;" class="fa fa-exchange" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-md-5 my-1 align-self-center">
                                    <label class="sr-only" for="input-noi-den">Nơi đi</label>
                                    <div class="autocomplete" id="group-input-noi-den">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <input autocomplete="off" type="text" class="form-control input-xs" id="input-noi-den" name="input-noi-den" placeholder="Nơi đến">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 align-self-center">
                            <div class="row">
                                <div class="col-md-3 my-1 align-self-center">
                                    <label class="sr-only" for="input-ngay-khoi-hanh">Ngày khởi hành</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-xs datepicker" id="input-ngay-khoi-hanh" name="input-ngay-khoi-hanh" placeholder="Ngày khởi hành" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1 align-self-center" id="contaier-ngay-ve">
                                    <label class="sr-only" for="input-ngay-ve">Ngày Về</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" data-provider="datepicker" class="form-control datepicker input-xs" name="input-ngay-ve" id="input-ngay-ve" placeholder="Ngày về" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1 align-self-center">
                                    <label class="sr-only" for="so-khach">Số Khách</label>
                                    <div class="input-group">
                                        <input type="number" name="so-khach" class="form-control input-xs" id="so-khack" placeholder="Số lượng vé">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1 align-self-center">
                                    <button id="btn-tim-kiem" type="button" class="btn border-warning btn-outline-warning btn-md">Tìm kiếm vé tàu</button>
                                </div>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>          
        </div>