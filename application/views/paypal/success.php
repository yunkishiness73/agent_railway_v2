<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php include('head.php'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="success">Thank you! Your payment was successful.</h4>
				<p>Item Name : <span><?php echo $item_name; ?></span></p>
				<p>Item Number : <span><?php echo $item_number; ?></span></p>
				<p>TXN ID : <span><?php echo $txn_id; ?></span></p>
				<p>Amount Paid : <span>$<?php echo $payment_amt.' '.$currency_code; ?></span></p>
				<p>Payment Status : <span><?php echo $status; ?></span></p>
				
				<a href="<?php echo base_url('products'); ?>">Back to Products</a>
			</div>
		</div>
	</div>
</body>
</html>