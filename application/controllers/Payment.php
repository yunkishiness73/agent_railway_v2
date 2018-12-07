<?php
	/**
	 * 
	 */
	class Payment extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ve_model');
			$this->load->library('google');
		}

		public function getLoginUrl() {
			$data['google_login_url'] = $this->google->get_login_url();
			echo $data['google_login_url'];
		}

		function passenger_detail(){
			if(!empty($_POST['tickets'])){

				// echo "<pre>";
				// var_dump($_SESSION['tickets']);
				// echo "</pre>";

				// die;
				if(!isset($_SESSION['trang_thai'])) {
					$_SESSION['trang_thai'] = 0;
				}
				

				if(empty($_SESSION['tickets']) && $_SESSION['trang_thai'] == 0){

					// echo "<pre>";
					// var_dump($_SESSION['tickets']);
					// var_dump($_SESSION['trang_thai']);
					// echo "</pre>";

					$_SESSION['tickets'] = json_decode($_POST['tickets']);
					$_SESSION['trang_thai'] = 1;

					// echo "<pre>";
					// var_dump($_SESSION['tickets']);
					// var_dump($_SESSION['trang_thai']);
					// echo "</pre>";
					// die();
					unset($_POST);
				}

				foreach($_SESSION['tickets'] as $ticket){
					if($this->ve_model->checkTicketIsBooked($ticket)){
						die('Fail to check out');
					}
				}
				reset($_SESSION['tickets']);
				foreach ($_SESSION['tickets'] as $ticket) {
					$this->ve_model->updateBookingStatusTicket($ticket);
					$this->ve_model->autoCancelBookTicket($ticket);
				}
				reset($_SESSION['tickets']);
				$resultHeader = $this->ve_model->timGa();
				$dataHeader = array('ga' => json_encode($resultHeader));
				// echo "<pre>";
				// var_dump($_SESSION['tickets']);
				// echo "</pre>";
				// die;
				if(count($_SESSION['tickets']) != 0) {
					// echo "<pre>";
					// var_dump($_SESSION['tickets']);
					// echo "</pre>";
					// die;
					$thongTinChuyen = $this->ve_model->layThongTinChiTietHanhTrinh($_SESSION['tickets'][0]);
				}

				$thongTinVe = [];
				foreach($_SESSION['tickets'] as $ticket){
					$thongTinVe[] = $this->ve_model->dataTicketsCart($ticket);
				}
				if(count($_SESSION['tickets']) != 0) {

					$data = array(
						'thongTinChuyen' => $thongTinChuyen,
						'thongTinVe' => $thongTinVe
						);


				}
				
				// echo "<pre>";
				// var_dump($data);
				// echo "</pre>";
				// die();
				$this->load->view('templates/header',$dataHeader);
					if(isset($data)) {
						$this->load->view('templates/main/passenger_detail',$data);
					} else {
						$this->load->view('templates/main/passenger_detail');
					}
					
				$this->load->view('templates/footer');
				
			}else{
				die("Can't book ticket");
			}
		}

		public function update_status_available(){
			try{
				if(!empty($_POST['id_ticket'])){
					$id_ticket = $_POST['id_ticket'];
					unset($_POST);

					if($result = $this->ve_model->updateStatusAvailable($id_ticket)){
						echo "<pre>";
						var_dump($_SESSION['tickets']);
						echo "</pre>";

						// die;
						reset($_SESSION['tickets']);
						$count = 0;
						foreach($_SESSION['tickets'] as $ticket){
							if($ticket == $id_ticket){
								unset($_SESSION['tickets'][$count]);
								$_SESSION['tickets'] = array_values($_SESSION['tickets']);
							}
							$count += 1;
						}
						echo "<pre>";
						var_dump($_SESSION['tickets']);
						echo "</pre>";
						die();
						return true;
					}
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			echo "Failed to delete";
			return false;
		}
	}