<?php include 'templates/header.php' ?>
<div class="row" style="background-color: black;">
	<div class="col-md-4 text-center col-lg-4 d-none d-md-block d-lg-block">
		<span style="color: white;"><i style="color: #f9dd22;font-size: 32px;" class="fa fa-check-circle-o" aria-hidden="true"></i></span>
		<p style="color: white;">Bằng Giá Tại Quầy</p>
	</div>
	<div class="col-md-4 text-center col-lg-4 d-none d-md-block d-lg-block">
		<span style="color: white;"><i style="color: #f9dd22;font-size: 32px;" class="fa fa-check-circle-o" aria-hidden="true"></i></span>
		<p style="color: white;">Không Phí Quản Lý</p>
	</div>
	<div class="col-md-4 text-center col-lg-4 d-none d-md-block d-lg-block">
		<span style="color: white;"><i style="color: #f9dd22;font-size: 32px;" class="fa fa-check-circle-o" aria-hidden="true"></i></span>
		<p style="color: white;">Phục Vụ 24/24</p>
	</div>
</div>
<div class="row pt-1 pb-1">
	<div id="carouselAdvertisement" class="carousel slide d-none d-md-block d-lg-block" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselAdvertisement" data-slide-to="0" class="active"></li>
			<li data-target="#carouselAdvertisement" data-slide-to="1"></li>
			<li data-target="#carouselAdvertisement" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="row" alt="First slide">
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement1.jpg'); ?>" alt="First slide" >
					</div>
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement2.jpg'); ?>" alt="First slide">
					</div>
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement3.jpg'); ?>" alt="First slide">
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="row" alt="Second slide">
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement2.jpg'); ?>">
					</div>
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement3.jpg'); ?>">
					</div>
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement4.jpg'); ?>">
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="row" alt="Thirst slide">
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement4.jpg'); ?>" alt="First slide">
					</div>
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement1.jpg'); ?>" alt="First slide">
					</div>
					<div class="col-md-4">
						<img class="d-block w-100" style="border-image: 1px;" src="<?php echo base_url('public/advertisement/advertisement2.jpg'); ?>" alt="First slide">
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselAdvertisement" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselAdvertisement" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<div class="row mt-3 mb-3 pl-5 pr-5">
	<div class="col-12 d-none d-md-block d-lg-block" style="background-color: #efedde;">
		<h2 class="text-center">Đặt vé tàu hỏa một cách dễ dàng</h2>
		<p class="text-center">
			Nguyễn Kiệt - Ngô Lộc Agent Railway là hệ thống Website đặt vé tàu online do Nguyễn Tuấn Kiệt và Ngô Đình Lộc đồng sáng lập, với mong muốn mang đến cho bạn những trải nghiệm tuyệt vời nhất khi đặt vé tàu tại website của chúng tôi. Với hàng chục chuyến tàu Bắc-Nam khởi hành mỗi ngày, chỉ sau vài cái click chuột là bạn có thể đặt mua được vé tàu mà mình mong muốn. Hệ thống thanh toán dựa trên nền tảng của trang thanh toán trực tuyến Paypal đảm bảo tính an toàn cho thông tin của bạn.
		</p>
	</div>
</div>
<div class="row mb-3 mt-3 pl-5 pr-5">
	<div class="col-12 d-none d-md-block d-lg-block" style="background-color: #efedde;">
		<div class="row p-3">
			<div class="col-12 mb-4">
				<h2 class="text-center">Những nền tảng chính áp dụng vào website này</h2>
			</div>
			<div class="col-4">
				<img width="100%;" src="<?php echo base_url('public/logo/codeigniter_logo.jpg'); ?>">
			</div>
			<div class="col-4">
				<img width="100%;" src="<?php echo base_url('public/logo/paypal_logo.png'); ?>">
			</div>
			<div class="col-4">
				<img width="100%;" src="<?php echo base_url('public/logo/easybook_logo.png'); ?>">
			</div>
		</div>
	</div>
</div>
<?php include 'templates/footer.php'; ?>