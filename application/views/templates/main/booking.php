<!--Modal Detail-->
<?php //var_dump($data); ?>
<div class="modal fade choose-ticket-modal" id="modal-ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="main-cotainer-ticket">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12 col-sm-12 col-lg-6">
        		<div class="row">
        			<div class="col-md-12">
        				<ul class="nav nav-pills mb-3" id="container-toa-ve" role="tablist">
        				  <!-- Content will generate here through ajax -->
        				</ul>
        				<div class="row mt-3 mb-3">
        					<div class="col-4 col-xs-12 text-center">
        						<div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-12 align-center">
                        <div style="width: 50px;height: 50px;border:1px solid;border-radius: 1px;margin: auto;" class="ghe-co-san"></div>
                      </div>
                      <div class="col-xs-6 col-xs-12 col-sm-6 col-md-12 text-center">
                        Ghế còn trống
                      </div>      
                    </div>
        					</div>
        					<div class="col-4 col-xs-12 text-center">
        						<div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-12 align-center">
                        <div style="width: 50px;height: 50px;border:1px solid;border-radius: 1px;margin: auto;" class="ghe-da-dat"></div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-12 text-center">
                        Ghế đã được đặt
                      </div>      
                    </div>
        					</div>
        					<div class="col-4 col-xs-12 text-center">
        						<div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-12 align-center">
                        <div style="width: 50px;height: 50px;border:1px solid;border-radius: 1px;margin: auto;" class="ghe-da-chon"></div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-12 text-center">
                        Ghế đang chọn
                      </div>      
                    </div>
        					</div>
        				</div>
        			</div>
        			<div class="col-md-12">
   						<div class="tab-content" id="tab-content-ve">
   							<!--Noi in ve-->
   						</div>
        			</div>
        		</div>	
        	</div>
        	<div class="col-lg-6 col-md-12 col-sm-12">
        		<!--Noi in thong tin ve-->
            <div class="card text-center d-none d-sm-block"> 
              <div class="card-header">Vé Của Bạn</div>
              <div class="card-body">
                <div>
                  <table style="font-size: 12px;padding: 2px;" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 8.33%;" scope="col">#</th>
                        <th style="width: 8.33%;">Toa</th>
                        <th style="width: 33.32%;" scope="col">Loại ghế</th>
                        <th style="width: 24.99%;" scope="col">Số ghế</th>
                        <th style="width: 24.99%;" scope="col">Giá</th>
                      </tr>
                    </thead>
                    <tbody id="ticket-cart">
                    </tbody>
                    <tfoot>
                      <td colspan="2">
                        <button id="btn-thanh-toan" class="btn btn-primary">Thanh Toán</button>
                      </td>
                      <td colspan="3">Tổng Cộng <strong id="total">0</strong> VND</td>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p  class="text-success">Chúc bạn có một chuyến đi vui vẻ</p>
              </div>
            </div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-huy-dat-ve" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" id="btn-tiep-tuc-thanh-toan" class="btn btn-primary">Tiếp tục</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal Detail-->

<!--Modal notification-->
<div class="modal fade" id="modal-notify" tabindex="-1" role="dialog" aria-labelledby="modal-notify-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-notify-label">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Giỏ vé của bạn trống, hãy chọn vé trước khi tiến hành thanh toán</strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-close-notify" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--End modal notification-->

<div class="row mt-3 mb-2">
	<div class="col-md-12">
		<ul class="nav nav-pills nav-wizard">
			<li class="nav-item"><a class="nav-link" href="#">Trang Chủ</a></li>
			<li class="nav-item"><a class="nav-link" href="#">Vé Tàu Hỏa</a></li>
			<li class="nav-item"><a class="nav-link active" href="#">Kết quả tìm kiếm</a></li>
		</ul>
	</div>
</div>

<div class="container-fluid pl-2 pr-2">	
	<div class="row mb-2 d-none d-lg-block">
		<div class="col-md-12">
			<img style="width: 100%; height: 100%;" src="<?php echo base_url('public/chi_tiet_hanh_trinh.jpg');?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 route-info pt-3 pb-3">
			<div class="float-left mr-3"><?php echo $_SESSION['input-noi-di']; ?></div>
			<div class="float-left mr-3"><i class="fa fa-long-arrow-right"></i></div>
			<div class="float-left"><?php echo $_SESSION['input-noi-den']; ?></div>
		</div>
		<div class="col-md-4 route-info pt-3 pb-3">
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-left"></i></a></div>
			<div class="float-left"><?php echo $_SESSION['input-ngay-khoi-hanh']; ?></div>
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-right"></i></a></div>
		</div>	
	</div>
	<?php foreach($data as $chi_tiet_tuyen): ?>
	<div class="container-depart-info mb-5">
		<div class="row p-5 general-depart-info">
			<div class="col-auto col-md-2 col-sm-12">
				<div class="float-left"><?php echo $chi_tiet_tuyen['gio_khoi_hanh']; ?></div>
				<div class="ml-2 float-left d-block d-md-none d-lg-none d-xl-none"> <?php echo $chi_tiet_tuyen['so_luong_ghe']; ?> ghế</div>
			</div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-di'] ?></div>
			<div class="col-auto col-md-1 col-sm-2"><i class="fa fw fa-angle-right"></i></div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-den']; ?></div>
			<div class="col-auto col-md-1 col-sm-5 d-none d-lg-block d-xl-block"><?php echo $chi_tiet_tuyen['so_luong_ghe']; ?> ghế</div>
			<div class="col-auto col-md-2 col-sm-8 price-ticket text-center"> <?php echo number_format($chi_tiet_tuyen['gia_ve']); ?> VND<i class="fa fa-angle-down"></i></div>
			<div class="col-auto col-md-2 col-sm-4 text-right pr-2">
				<button id="btn-choose<?php echo $chi_tiet_tuyen['id']; ?>" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".choose-ticket-modal">Chọn Vé</button>
			</div>
		</div>
		<div class="row p-2 sub-info general-depart-info">
			<div class="col-sm-4 text-left">
				<img class="size-image-logo" src="<?php echo base_url('public/logo/logo_dsvn.png');?>">
			</div>
			<div class="col-sm-4 text-left">
				<?php echo $chi_tiet_tuyen['ten_tau']; ?>
			</div>
			<div class="col-sm-4 text-right">
				<a href="#">Detail <i class="fa fa-angle-down"></i></a>
			</div>
		</div>
	</div>

	<?php endforeach; ?>

	<?php if(!empty($_SESSION['input-ngay-ve'])): ?>
	<!--Luot Ve-->
		<?php foreach($comeBackTrains as $comeBack): ?>
	<div class="row">
		<div class="col-md-8 route-info pt-3 pb-3">
			<div class="float-left mr-3"><?php echo $_SESSION['input-noi-den']; ?></div>
			<div class="float-left mr-3"><i class="fa fa-long-arrow-right"></i></div>
			<div class="float-left"><?php echo $_SESSION['input-noi-di']; ?></div>
		</div>
		<div class="col-md-4 route-info pt-3 pb-3">
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-left"></i></a></div>
			<div class="float-left"><?php echo $_SESSION['input-ngay-ve']; ?></div>
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-right"></i></a></div>
		</div>	
	</div>
	<div class="container-depart-info mb-5">
		<div class="row p-5 general-depart-info">
			<div class="col-auto col-md-2 col-sm-12">
				<div class="float-left"><?php echo $comeBack['gio_khoi_hanh']; ?></div>
				<div class="ml-2 float-left d-block d-md-none d-lg-none d-xl-none"> <?php echo $comeBack['so_luong_ghe']; ?> ghế</div>
			</div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-den']; ?></div>
			<div class="col-auto col-md-1 col-sm-2"><i class="fa fw fa-angle-right"></i></div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-di']; ?></div>
			<div class="col-auto col-md-1 col-sm-5 d-none d-lg-block d-xl-block"><?php echo $comeBack['so_luong_ghe']; ?> ghế</div>
			<div class="col-auto col-md-2 col-sm-8 price-ticket text-center"><?php echo number_format($comeBack['gia_ve']); ?> VND <i class="fa fa-angle-down"></i></div>
			<div class="col-auto col-md-2 col-sm-4 text-right pr-2">
				<button id="btn-choose<?php echo $comeBack['id']; ?>" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".choose-ticket-modal">Chọn Vé</button>
			</div>
		</div>
		<div class="row p-2 sub-info general-depart-info">
			<div class="col-sm-4 text-left">
				<img class="size-image-logo" src="<?php echo base_url('public/logo/logo_dsvn.png');?>">
			</div>
			<div class="col-sm-4 text-left">
				<?php echo $comeBack['ten_tau']; ?>
			</div>
			<div class="col-sm-4 text-right">
				<a href="#">Detail <i class="fa fa-angle-down"></i></a>
			</div>
		</div>
	</div>
		<?php endforeach; ?>
	<?php endif; ?>

</div>


<script type="text/javascript">

  dataTickets = [];

	function AJAXProcessingSearchTicket(id){
		$.ajax({
			type: "post",
			url: "<?php echo base_url('ajax_rendering/createTabToa'); ?>",
			data: {id_chi_tiet_hanh_trinh: id}
		}).done(function(data){
			document.getElementById("container-toa-ve").innerHTML = data;
		}).fail(function(data){
			alert("Failed to call ajax");
		});

    $.ajax({
      type: "post",
      url: "<?php echo base_url('ajax_rendering/createVe'); ?>",
      data: {id_chi_tiet_hanh_trinh: id}
    }).done(function(data){
      document.getElementById("tab-content-ve").innerHTML = data;
      clickTicket();
    }).fail(function(data){
      alert("Failed to call ajax");
    });
	}



	function triggerChooseVe(id){
		var buttonChoose = document.getElementById('btn-choose'+id);
		buttonChoose.addEventListener("click",function(){
			AJAXProcessingSearchTicket(id);
      resetTicketCart();
		});
	}

	<?php reset($data); ?>
	<?php foreach($data as $item): ?>
		triggerChooseVe(<?php echo $item['id']; ?>);
	<?php endforeach; ?>

  <?php reset($comeBackTrains); ?>
  <?php foreach($comeBackTrains as $comeBack): ?>
    triggerChooseVe(<?php echo $comeBack['id']; ?>);
  <?php endforeach; ?>

  function clickTicket(){
    var tickets = document.getElementsByClassName("ghe-co-san");
    //console.log(tickets.length);
    for(var i = 0; i < tickets.length; i++){
      tickets[i].addEventListener("click",function(){
        if(this.getAttribute("data-ticket")){
          var id_ticket = this.getAttribute("data-ticket");
          //AJAXGetInfoTicket(id_ticket);
          changeStatusTicket(id_ticket,this);
        }
      });
    }
  }

  /*
  function AJAXGetInfoTicket(id){
    $.ajax({
      type: "post",
      url: "<?php //echo base_url('ve/lay_thong_tin_ve'); ?>",
      data: {id_ve:id}
    }).done(function(data){
      var obj = JSON.parse(data);
      //console.log(obj);
      //addItemTicketCart(id,obj);
    }).fail(function(jqXHR,textStatus){
      console.log(jqXHR);
    });
  }
  */

  function changeStatusTicket(id_ticket,ticket){
    if(ticket.classList.contains("ghe-co-san")){
      ticket.classList.add("ghe-da-chon");
      ticket.classList.remove("ghe-co-san");
      addItemTicketCart(id_ticket,prepareDataTicket(ticket));
      dataTickets.push(prepareDataTicket(ticket));
      //AJAXAddTicket(id_ticket);
      //AJAXAddTicketToSession(id_ticket);
    }else if(ticket.classList.contains("ghe-da-chon")){
      ticket.classList.add("ghe-co-san");
      ticket.classList.remove("ghe-da-chon");
      removeItemTicketCart(id_ticket,prepareDataTicket(ticket));
      removeElementInTickets(prepareDataTicket(ticket));
      //AJAXRemoveTicket(id_ticket);
      //AJAXRemoveTicketFromSession(id_ticket);
    }
  }

  /*
  function AJAXAddTicket(id_ticket){
     $.ajax({
      type: "post",
      url: "<?php //echo base_url('ve/lay_thong_tin_ve'); ?>",
      data: {id_ve:id_ticket}
    }).done(function(data){
      //var obj = JSON.parse(data);
      //console.log(obj);
      console.log(data);
      //addItemTicketCart(id_ticket,obj);
    }).fail(function(jqXHR,textStatus){
      console.log(jqXHR);
    });
  }
  */

  /*
  function AJAXRemoveTicket(id_ticket){
     $.ajax({
      type: "post",
      url: "<?php //echo base_url('ve/lay_thong_tin_ve'); ?>",
      data: {id_ve:id_ticket}
    }).done(function(data){
      //var obj = JSON.parse(data);
      //console.log(obj);
      //removeItemTicketCart(id_ticket,obj);
      console.log(data);
    }).fail(function(jqXHR,textStatus){
      console.log(jqXHR);
    });
  }


  function AJAXAddTicketToSession(id_ticket){
    $.ajax({
      type: "post",
      url: "<?php //echo base_url('processing_session/addItemTicketCart'); ?>",
      data: {id_ve:id_ticket}
    }).done(function(data){
      //var obj = JSON.parse(data);
      //console.log(obj);
      //console.log(data);
      //removeItemTicketCart(id_ticket,obj);
    }).fail(function(jqXHR,textStatus){
      console.log(jqXHR);
    });
  }
  */ 

  /*
  function AJAXRemoveTicketFromSession(id_ticket){
    $.ajax({
      type: "post",
      url: "<?php //echo base_url('processing_session/removeItemTicketCart'); ?>",
      data: {id_ve:id_ticket}
    }).done(function(data){
      //var obj = JSON.parse(data);
      //console.log(obj);
      console.log(data);
      //removeItemTicketCart(id_ticket,obj);
    }).fail(function(jqXHR,textStatus){
      console.log(jqXHR);
    });
  }

  function AJAXClearTicketCart(){
    $.ajax({
      type: "post",
      url: "<?php //echo base_url('processing_session/clearTicketCart'); ?>",
    }).done(function(data){
      //var obj = JSON.parse(data);
      //console.log(obj);
      console.log(data);
      //removeItemTicketCart(id_ticket,obj);
    }).fail(function(jqXHR,textStatus){
      console.log(jqXHR);
    });
  }
  */
  function addItemTicketCart(id,ticket){
    //console.log(ticket);
    var total = document.getElementById("total");
    var ticketCart = document.getElementById("ticket-cart");
    var tableRow = document.createElement("TR");
    tableRow.setAttribute("id","ticket-"+id);
    var number = document.createElement("TH");
    number.classList.add("number-ticket");
    number.innerHTML = (document.getElementsByClassName("number-ticket").length + 1);
    tableRow.appendChild(number);
    var toa = document.createElement("td");
    toa.innerHTML = (ticket.ten_toa).match(/\d+/g);
    tableRow.appendChild(toa);
    var loaiGhe = document.createElement("TD");
    loaiGhe.innerHTML = ticket.ten_loai_ghe;
    tableRow.appendChild(loaiGhe);
    var soGhe = document.createElement("TD");
    soGhe.innerHTML = (ticket.so_ghe);
    tableRow.appendChild(soGhe);
    var giaVe = document.createElement("TD");
    total.innerHTML = Number(total.innerHTML) + Number(ticket.gia_ve);
    giaVe.innerHTML = Number(ticket.gia_ve);
    giaVe.innerHTML += " VND";
    giaVe.classList.add("price-ticket");
    tableRow.appendChild(giaVe);
    tableRow.style.display = "none";
    ticketCart.appendChild(tableRow);
    $("#ticket-"+id).fadeIn(1000);
  }

  function prepareDataTicket(element){
    var ticket = [];
    ticket['id_ve'] = element.getAttribute("data-ticket");
    ticket['ten_toa'] = element.getAttribute("data-ten-toa");
    ticket['ten_loai_ghe'] = element.getAttribute("data-ten-loai-ghe");
    ticket['gia_ve'] = element.getAttribute("data-gia-ve");
    ticket['so_ghe'] = (element.getAttribute("id")).match(/\d+/g)[0];
    //console.log(ticket);
    return ticket;
  }

  function removeItemTicketCart(id,ticket){
    var containerTicket = document.getElementById("ticket-cart");
    var tableRow = document.getElementById("ticket-"+id);
    var total = document.getElementById("total");
    var numberTicket = document.getElementsByClassName("number-ticket");
    total.innerHTML = Number(total.innerHTML) - Number(ticket.gia_ve);
    $("#ticket-"+id).fadeOut(1000,function(){
      containerTicket.removeChild(tableRow);
      for(var i = 0; i < numberTicket.length; i++){
        numberTicket[i].innerHTML = i+1;
      }
    });   
  }

  function isEqual(obj1,obj2){
    var propers1 = Object.getOwnPropertyNames(obj1);
    var propers2 = Object.getOwnPropertyNames(obj2);

    if(propers1.length != propers2.length){
      return false;
    }

    for(var i = 0; i < propers1.length; i++){
      var properName = propers1[i];
      if(obj1[properName] !== obj2[properName]){
        return false;
      }
    }

    return true;
  }

  function containsObject(obj,arrayObject){
    for(var index = 0; index < arrayObject.length; index++){
      if(isEqual(obj,arrayObject[index])){
        return index;
      }
    }
    return false
  }

  function removeElementInTickets(ticket){
    var index = containsObject(ticket,dataTickets);
    dataTickets.splice(index,1);
    console.log(dataTickets);
  }

  function resetTicketCart(){
    document.getElementById("btn-huy-dat-ve").addEventListener("click",function(){
      dataTickets = [];
    });
    document.addEventListener("click",function(e){
      var modal = document.getElementById("main-cotainer-ticket");
      if(!$.contains(modal,e.target)){
        //console.log(e.target);
        dataTickets = [];
      }
    });
  }

  function triggerPayment(){
    document.getElementById('btn-thanh-toan').addEventListener("click",function(){
      goToPayment();
    });
    document.getElementById('btn-tiep-tuc-thanh-toan').addEventListener("click",function(){
      goToPayment();
    });
  }

  triggerPayment();

  function goToPayment(){
    if(dataTickets.length == 0){
      document.getElementById("btn-huy-dat-ve").click();
      $("#modal-notify").modal('show');
    }else{
      var data = [];
      for(var i = 0; i < dataTickets.length; i++){
        data.push(dataTickets[i].id_ve);
      }
      var form = document.createElement("FORM");
      form.action = "<?php echo base_url('payment/passenger_detail'); ?>";
      form.method = "POST";
      var input = document.createElement("INPUT");
      input.setAttribute("type","text");
      input.setAttribute("name","tickets");
      input.value = JSON.stringify(data);
      form.appendChild(input);
      document.body.appendChild(form);
      form.submit();

    }
  }



</script>

