<?php
	class Ve extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('ve_model');
		}

		public function index(){
			echo "Hello World";
		}

		public function tim_ve($data=false){
			$data = [48,49];
			$ve = $this->ve_model->timVe($data);
			var_dump($ve);
		}

		public function tim_kiem_ve_tau(){
			try{
				$result = $this->ve_model->timGa();
				$data = array('ga' => json_encode($result));
				$this->load->view('tim_kiem_ve_tau',$data);
			}catch(Exception $e){
				echo "Cause error ".$e->getMessage()."<br>";
			}		
		}

		public function booking(){
			try{
				if(!empty($_POST['input-noi-di']) && !empty($_POST['input-noi-den']) && !empty($_POST['input-ngay-khoi-hanh'])){
					$comeBack = '';
					$_SESSION['input-noi-di'] = $_POST['input-noi-di'];
					$_SESSION['input-noi-den'] = $_POST['input-noi-den'];
					$_SESSION['input-ngay-khoi-hanh'] = $_POST['input-ngay-khoi-hanh'];
					if(!empty($_POST['input-ngay-ve'])){
						$_SESSION['input-ngay-ve'] = $_POST['input-ngay-ve'];
						$comeBack = $this->ve_model->timChuyen(array($_SESSION['input-noi-den'],$_SESSION['input-noi-di'],$_SESSION['input-ngay-ve']));
					}
					unset($_POST);
				}else{
					die("Sorry some thing went wrong");
				}
				$resultHeader = $this->ve_model->timGa();
				$dataHeader = array('ga' => json_encode($resultHeader));
				$resultMain = $this->ve_model->timChuyen(array($_SESSION['input-noi-di'],$_SESSION['input-noi-den'],$_SESSION['input-ngay-khoi-hanh']));
				$dataMain = array(
					'data' => $resultMain,
					'comeBackTrains' => $comeBack
				);
				$this->load->view('templates/header',$dataHeader);
				$this->load->view('templates/main/booking',$dataMain);
				$this->load->view('templates/footer');
			}catch(Exception $e){
				echo "Cause error ".$e->getMessage()."<br>";
			}

			return false;
		}

		public function processing_search_ticket(){
			try{
				if(!empty($_POST['id_chi_tiet_hanh_trinh'])){
					$idChiTietHanhTrinh = $_POST['id_chi_tiet_hanh_trinh'];
					$result = $this->ve_model->timToa($idChiTietHanhTrinh);

					echo $result;
				}
			}catch(Exception $e){
				echo "Cause error ".$e->getMessage()."<br>";
			}
			return false;
		}

		function lay_thong_tin_ve(){
			try{
				if(!empty($_POST['id_ve'])){
					$id_ve = $_POST['id_ve'];
					//echo json_encode($this->ve_model->layThongTinVe($id_ve));
				 	var_dump($this->ve_model->layThongTinVe($id_ve));
				}else{
					die("Can't retrieve data from form submit");
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}

			return false;
		}

	}