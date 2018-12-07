<?php include('checkLoginStatus.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php include('head.php') ?>

  <style>

    body { font-family: Helvetica }

    .jumbotron {
      background-color: #8c7ae6
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
              <div class="col-sm-12">

               <div class="jumbotron" style="padding: 2rem 1rem;">

                 <div class="row">
                   <div class="col-sm-6 col-md-2">
                    <!-- <label >Điểm khởi hành</label><input type="text" class="form-control"> -->
                    <div class="autocomplete" id="group-input-noi-di">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control input-xs" id="input-noi-di" placeholder="Nơi đi" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-2">
                   <div class="autocomplete" id="group-input-noi-den">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control input-xs" id="input-noi-den" placeholder="Nơi đến" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-2"><input type="text" class="form-control ngay-khoi-hanh" placeholder="Ngày khởi hành"></div>
                <div class="col-sm-6 col-md-2"><button class="form-control btn btn-warning search" >Tìm Kiếm</button></div>
              </div>


            </div>

            <div class="card-body table-full-width table-responsive" style="text-align: center; width: 80%; margin: auto;">
              <table class="table table-hover" >
                <thead>
                  <th style="font-size: 16px; text-align: center !important;">Giờ khởi hành</th>
                  <th style="font-size: 16px; text-align: center !important; ">Tuyến</th>
                  <th style="font-size: 16px; text-align: center !important;">Còn trống</th>
                  <th style="font-size: 16px; text-align: center !important;">Giá cơ sở</th>

                </thead>
                <tbody>
                  <?php if(isset($tickets)) { ?>
                  <?php foreach ($tickets as $value): ?>
                    <tr style="height: 30px!important;">
                     <td><?= $value['gio_khoi_hanh'] ?></td>
                     <td><?= $value['ten_tuyen'] ?></td>
                     <td><?= $value['so_luong_ghe'] ?> ghế</td>
                     <td><?= number_format($value['gia_ve']) ?> VNĐ</td>
                   </tr>
                 <?php endforeach ?>

                 <?php } ?>

               </tbody>
             </table>
           </div>

         </div>  <!-- end left content-->

       </div>

     </div>
   </div>

   <!-- Start footer -->

   <?php include('footer.php') ?>
   

   <!-- End footer -->
 </div>
</div>

</body>

<?php include('bottom.php') ?>
<script>

  path = '<?= base_url() ?>';

  $(function() {
    $('.ngay-khoi-hanh').datepicker({ 
      dateFormat: "yy-mm-dd",
      minDate: 0
    });

    $('body').on('click', '.search', function(event) {
      event.preventDefault();
      _ten_ga_di = $('#input-noi-di').val();
      _ten_ga_den = $('#input-noi-den').val();
      _ngay_khoi_hanh = $('.ngay-khoi-hanh').val();

      flag = true;

      if(_ten_ga_di === '' || _ten_ga_den === '' || _ngay_khoi_hanh === '') {
        alert('- Bạn chưa nhập đầy đủ thông tin !' + '\n' + '- Vui lòng kiểm tra lại !');
        flag = false;
      }

      if(flag == true) {
        
        url = '<?= base_url(); ?>Admin_controller/search?f='+_ten_ga_di+'&t='+_ten_ga_den+'&d='+_ngay_khoi_hanh;
        window.open(url, '_self');

      }

    });

  });

  

  function autocomplete(input,bigComponent,data){
    var currentFocus = -1;
    input.addEventListener("input",function(){
      var containerItems,select,optionItem;
      var value = this.value;
      closeAllLists();

      if(!value){
        return false;
      }

      currentFocus = -1;

      containerItems = document.createElement("DIV");
      containerItems.setAttribute("class","form-group autocomplete-items");
      containerItems.setAttribute("id",this.id + "AutocompleteItems");
      bigComponent.appendChild(containerItems);


      for(var i = 0 ; i < data.length; i++){
        if(value.toLowerCase() == data[i].substring(0,value.length).toLowerCase()){
          option = document.createElement("DIV");
          option.innerHTML = "<i class='fa fa-map-marker'></i> <strong>" + data[i].substr(0,value.length) + "</strong>";
          option.innerHTML += data[i].substr(value.length);
          option.innerHTML += "<input type='hidden' value='" + data[i] + "'>";

          option.addEventListener("click",function(){
            input.value = this.getElementsByTagName("input")[0].value;
            closeAllLists();
          });

          containerItems.appendChild(option);

        }
      }

    });

    input.addEventListener("keydown",function(e){
      var containerItems = document.getElementById(this.id + "AutocompleteItems");
      if(containerItems){
        containerItems = containerItems.getElementsByTagName("div");
                    //console.log(e);
                  }
                  if(e.keyCode == 40){
                    currentFocus += 1;
                    addActive(containerItems);
                  }else if(e.keyCode == 38){
                    currentFocus -= 1;
                    addActive(containerItems);
                  }else if(e.keyCode == 13){
                    e.preventDefault();
                    if(currentFocus > -1){
                      if(containerItems){
                        containerItems[currentFocus].click();
                      }
                    }
                  }

                });

    function addActive(x){

      if(!x){
        return false;
      }
      removeActive(x);
      if(currentFocus >= x.length){
        currentFocus = 0;
      }
      if(currentFocus < 0){
        currentFocus = x.length - 1;
      }
                //console.log(x);
                x[currentFocus].classList.add("autocomplete-active");
              }

              function removeActive(x){
                for(var i = 0; i < x.length; i++){
                  x[i].classList.remove("autocomplete-active");
                }
              }

              function closeAllLists(e){
                var flag = false;
                var x = bigComponent.getElementsByClassName("autocomplete-items");
                if(x.length > 0){
                  x = x[0];
                  for(var i = 0; i < data.length ; i++){
                    if(e != x[i] || e != input){
                      flag = true;
                      break;
                    }
                  }
                }

                if(flag){
                    //console.log(bigComponent.getElementsByClassName("autocomplete-items"));
                    if(bigComponent.getElementsByClassName("autocomplete-items").length > 0){
                        //console.log(bigComponent.getElementsByClassName("autocomplete-items"));
                        bigComponent.removeChild(bigComponent.getElementsByClassName("autocomplete-items")[0]);
                      }
                    }
                  }

                  document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
                  });
                }        

                function changeBackgroundImage(){
                  var i = 0;
                  var newImage;
                  var background = document.getElementsByClassName("container-box-book-ticket")[0];
                  var intervalChangeBackgroundImage = setInterval(function(){
                    $(".container-box-book-ticket-bg").fadeOut(300,function(){
                      i++;
                      if(i > 4){
                        i = 0;
                      }
                    //console.log(i);
                    newImage = "<?php echo base_url(); ?>" + "public/background_image/background_" + i + ".jpg";
                    $(".container-box-book-ticket-bg").css("background-image","url('"+newImage+"')");
                    $(".container-box-book-ticket-bg").fadeIn(1000);
                  });
                  },6000);
                }
                changeBackgroundImage();

                function initSearch(){
                  var inputNoiDi = document.getElementById("input-noi-di");
                  var inputNoiDen = document.getElementById("input-noi-den");
                  var objGa = '<?php echo $ga; ?>';
                  objGa = JSON.parse(objGa);
                  console.log(objGa);

                  var data = [];
                  var valueInputGaDen = document.getElementById("input-noi-den").value;
                  for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDen.toLowerCase()){
                      data.push(objGa[i]["ten_ga"]);
                    }
                  }

                  autocomplete(document.getElementById("input-noi-di"),document.getElementById("group-input-noi-di"), data);

                  autocomplete(document.getElementById("input-noi-den"),document.getElementById("group-input-noi-den"), data);


                  inputNoiDi.addEventListener("input",function(){
                    var data = [];
                    var valueInputGaDen = document.getElementById("input-noi-den").value;
                    for(var i = 0; i < objGa.length; i++){
                      if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDen.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                      }
                    }
                //console.log(data);
                autocomplete(document.getElementById("input-noi-di"),document.getElementById("group-input-noi-di"), data);
              });

                  inputNoiDen.addEventListener("input",function(){
                    var data = [];
                    var valueInputGaDi = document.getElementById("input-noi-di").value;
                    for(var i = 0; i < objGa.length; i++){
                      if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDi.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                      }
                    }
                    autocomplete(document.getElementById("input-noi-den"),document.getElementById("group-input-noi-den"), data);
                //console.log(data);
              });
                }

                initSearch();


                function checkExistsStation(ga){
                  var objGa = '<?php echo $ga; ?>';
                  objGa = JSON.parse(objGa);
                  for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"] == ga.value){
                      return true;
                    }
                  }
                  return false;
                }



              </script>

              </html>