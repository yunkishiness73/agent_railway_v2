
<div class="row mt-3 mb-2">
	<div class="col-md-12">
		<ul class="nav nav-pills nav-wizard">
			<li class="nav-item"><a class="nav-link" href="#">Trang Chủ</a></li>
			<li class="nav-item"><a class="nav-link" href="#">Vé Tàu Hỏa</a></li>
			<li class="nav-item"><a class="nav-link" href="#">Kết Quả Tìm Kiếm</a></li>
			<li class="nav-item"><a class="nav-link active" href="#">Thanh Toán</a></li>
		</ul>
	</div>
</div>

<div class="container-fluid wrapper-payment">
	<div class="row">
		<div class="col-md-12 mb-5">
			<h1>Điền thông tin chi tiết và thanh toán</h1>
			<div>
				<a class="btn btn-danger login-google" style="color: #ffffff; "><i class="fa fa-google"></i> Đăng nhập với Google</a> để thanh toán nhanh hơn
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Thông tin ghi trên vé
				</div>
				<div class="card-body">
					<?php if(isset($_SESSION['name'])) { ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Quý Danh</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12" value="<?= $_SESSION['name'] ?>">
					</div>
					<?php } else { ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Quý Danh</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12">
					</div>
					<?php } ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Số điện thoại</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12">
					</div>
					<?php if(isset($_SESSION['email'])) { ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Email</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12" value="<?= $_SESSION['email'] ?>">
					</div>
					<?php } else { ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Email</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12">
					</div>
					<?php } ?>

					<?php if(isset($_SESSION['email'])) { ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Xác nhận lại email</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12" value="<?= $_SESSION['email'] ?>">
					</div>
					<?php } else { ?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-12">Xác nhận lại email</label>
						<input type="text" name="" class="form-control col-md-8 col-sm-12">
					</div>
					<?php } ?>
					
				</div>
				<div class="card-footer">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card mb-5">
				<div class="card-header">
					Thông tin hành trình
				</div>
				<div class="card-body">
					<?php if(isset($thongTinChuyen)) {?>
					<p>Tên tàu <strong><?= $thongTinChuyen->ten_tau; ?></strong></p>
					<p>Nơi khởi hành <strong><?= $_SESSION['input-noi-di'] ?></strong></p>
					<p>Nơi đến <strong><?= $_SESSION['input-noi-den'] ?></strong></p>
					<p>Ngày khởi hành <strong><?= $thongTinChuyen->ngay_khoi_hanh; ?></strong></p>
					<p>Giờ khởi hành <strong><?= $thongTinChuyen->gio_den; ?></strong></p>
					<?php } ?>
				</div>
				<div class="card-footer">
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					Giỏ vé của bạn
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="16.66%;" scope="col">Toa</th>
								<th width="24.99%;" scope="col">Số ghế</th>
								<th width="16.66%;" scope="col">Loại ghê</th>
								<th width="33.34%;" scope="col">Giá vé</th>
								<th width="8.33%;" scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($thongTinVe)) {?>
							<?php $total = 0; ?>
							<?php foreach($thongTinVe as $ve): ?>
								<tr id="ticket-<?= $ve->id; ?>">
									<td><strong><?= $ve->ten_toa; ?></strong></td>
									<td><strong><?= $ve->ten_ghe; ?></strong></td>
									<td><strong><?= $ve->ten_loai; ?></strong></td>
									<td><strong id="ticket-price-<?= $ve->id; ?>"><?= $ve->gia_ve ?></strong> VND</td>
									<td><a class="btn-remove-ticket" data-ticket="<?= $ve->id; ?>" href="javascript:void(0);"><i class="fa fa-trash"></i></a></td>
								</tr>
								<?php $total += $ve->gia_ve; ?>
							<?php endforeach; ?>
							<?php } ?>
						</tbody>
						<tfoot>
							<?php if(isset($thongTinVe)):?>
								<tr>
									<td colspan="2">Tổng cộng <strong id="total"><?= $total; ?></strong> VND</td>
									<td colspan="1"><a href="<?php echo base_url('products/buy/'); ?>" class="btn-outline-success" style="display: inline-block;"><img alt="" border="0" 
										src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" ></a></td>
									</tr>
								<?php endif; ?>
							</tfoot>
						</table>
					</div>
					<div class="card-footer">
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		function AJAXRemoveItemFromTicketCart(id){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('payment/update_status_available'); ?>",
				data: {id_ticket:id}
			}).done(function(data){
			//console.log(id);
			console.log(data);
		}).fail(function(jqXHR,textStatus){
			console.log(jqXHR);
		});
	}

	function clickRemoveTicket(){
		var btnRemove = document.getElementsByClassName("btn-remove-ticket");
		for(var i = 0; i < btnRemove.length; i++){
			btnRemove[i].addEventListener("click",function(){
				var idTicket = this.getAttribute("data-ticket");
				var priceTicket = document.getElementById("ticket-price-"+idTicket);
				var total = document.getElementById("total");
				total.innerHTML = Number(total.innerHTML) - Number(priceTicket.innerHTML);
				$("#ticket-"+idTicket).fadeOut(1000);
				AJAXRemoveItemFromTicketCart(idTicket);
			});
		}
	}

	clickRemoveTicket();

	function callGoogleAPI() {
		path = '<?= base_url() ?>';
		$.post(path + 'Payment/getLoginUrl', function(res) {
				window.open(res,'_blank');
		});
	}

	$(function() {
		$('body').on('click', '.login-google', function(event) {
			event.preventDefault();
			
			callGoogleAPI();

			path = '<?= base_url() ?>';

			$.post(path + 'auth/oauth2callback', function(res) {
				
				location.reload();
			});
			
		});
	});

</script>

<script>
	
</script>