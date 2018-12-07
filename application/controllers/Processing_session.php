<?php
	class Processing_session extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('ve_model');
		}

		public function addItemTicketCart(){
			try{
				if(!empty($_POST['id_ve'])){
					if(isset($_SESSION['id_ticket'])){
						$_SESSION['id_ticket'][] = $_POST['id_ve'];
					}else{
						$_SESSION['id_ticket'] = []; 
						$_SESSION['id_ticket'][] = $_POST['id_ve'];
					}
					var_dump($_SESSION['id_ticket']);
					//echo json_encode($_SESSION['id']);
				}else{
					die("Can not retrieve data from form");
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

		public function removeItemTicketCart(){
			try{
				var_dump($_SESSION);
				if(!empty($_POST['id_ve'])){
					$id_ticket = $_POST['id_ve'];
					if($key = array_search($id_ticket, $_SESSION['id_ticket'])){
						unset($_SESSION['id_ticket'][$key]);
						$_SESSION['id_ticket'] = array_values($_SESSION['id_ticket']);
						//echo json_encode($_SESSION['id_ticket']);
						var_dump($_SESSION['id_ticket']);
						return true;
					}
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

		public function clearTicketCart(){
			try{
				if(isset($_SESSION['id_ticket'])){
					unset($_SESSION['id_ticket']);
				}
				//echo json_encode($_SESSION['id_ticket']);
				var_dump($_SESSION);
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}
	}