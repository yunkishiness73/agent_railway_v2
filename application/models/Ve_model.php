<?php
	class Ve_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function timChuyen($data){
			try{
				$sql = "SELECT chi_tiet_hanh_trinh.*,tau.ten_tau,COUNT(ve.id) AS 'so_luong_ghe' FROM chi_tiet_hanh_trinh,tuyen,tau,ve WHERE chi_tiet_hanh_trinh.id_tuyen = tuyen.id AND chi_tiet_hanh_trinh.id_tau = tau.id AND chi_tiet_hanh_trinh.id = ve.id_chi_tiet_hanh_trinh AND tuyen.id_ga_di = (SELECT ga.id FROM ga WHERE ga.ten_ga = ?) AND tuyen.id_ga_den = (SELECT ga.id FROM ga WHERE ga.ten_ga = ?) AND chi_tiet_hanh_trinh.ngay_khoi_hanh = ? AND ve.trang_thai = 0 GROUP BY chi_tiet_hanh_trinh.id;";
				if($query = $this->db->query($sql,$data)){
					$result = $query->result_array();
					return $result;
				}

			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
		}

		public function timGa($another=''){
			try{
				$sql = "SELECT * FROM ga WHERE ga.trang_thai = 1 AND ga.id != ?";
				if($query = $this->db->query($sql,$another)){
					$result = $query->result_array();
					return $result;
				}

			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
		}

		public function timToa($data){
			try{
				$sql = "SELECT toa.*,COUNT(ve.id) AS 'so_luong_ve' FROM chi_tiet_hanh_trinh,chi_tiet_tau_toa,toa,tau,ve WHERE chi_tiet_hanh_trinh.id_tau = tau.id AND chi_tiet_tau_toa.id_tau = tau.id AND chi_tiet_tau_toa.id_toa = toa.id AND ve.id_toa = toa.id AND chi_tiet_hanh_trinh.id = ve.id_chi_tiet_hanh_trinh AND ve.trang_thai = 0 AND chi_tiet_hanh_trinh.id = ? GROUP BY toa.id";
				if($query = $this->db->query($sql,$data)){
					$result = $query->result_array();
					return $result;
				}

			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
			return false;
		}

		public function timVe($id_chi_tiet_hanh_trinh,$id_toa){
			try{
				$sql = "SELECT ve.*,toa.ten_toa,ghe.ten_ghe,loai_ghe.ten_loai FROM ve,ghe,chi_tiet_hanh_trinh,loai_ghe,toa WHERE ghe.id = ve.id_ghe AND ve.id_toa = ? AND toa.id = ve.id_toa AND ve.id_chi_tiet_hanh_trinh = chi_tiet_hanh_trinh.id AND ghe.id_loai = loai_ghe.id AND chi_tiet_hanh_trinh.id = ?";
				 if($query = $this->db->query($sql,array($id_toa,$id_chi_tiet_hanh_trinh))){
				 	return $query->result_array();
				 }else{
				 	die("Something went wrong when query database");
				 }
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

		public function layThongTinVe($id_ve){
			try{
				$sql = "SELECT toa.ten_toa,loai_ghe.ten_loai,ghe.ten_ghe,ve.gia_ve,ve.id FROM ve,toa,loai_ghe,ghe WHERE ve.id_toa = toa.id AND ve.id_ghe = ghe.id AND ghe.id_loai = loai_ghe.id AND ve.id = ?";
				if($query = $this->db->query($sql,$id_ve)){
					return $query->first_row();
				}else{
					die("Something went wrong in layThongTinVe();");
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}

			return false;
		}

		public function updateBookingStatusTicket($id_ticket){
			try{	
				$sql = "UPDATE ve SET trang_thai = 1 WHERE id = ?";
				if($query = $this->db->query($sql,$id_ticket)){
					return true;
				}
			}catch(Exception $e){
				die("Cause  error ".$e->getMessage()."<br>");
			}
			return false;
		}

		public function autoCancelBookTicket($id_ticket){
			try{
				$sql = "
				CREATE EVENT IF NOT EXISTS auto_cancel_".$id_ticket." ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 600 SECOND
				DO 
				BEGIN 
					UPDATE ve SET trang_thai = 0 WHERE id = ?; 
				END
				";
				if($query = $this->db->query($sql,$id_ticket)){
					return true;
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

		public function updateStatusAvailable($id_ticket){
			// try{
			// 	if($this->deleteEventAutoCancel($id_ticket)){
			// 		$sql = "UPDATE ve SET trang_thai = 0 WHERE id = ? ;";
			// 		if($query = $this->db->query($sql)){
			// 			return true;
			// 		}
			// 	}
			// }catch(Exception $e){
			// 	die("Cause error ".$e->getMessage()."<br>");
			// }
			// return false;
			// var_dump($id_ticket);
			// die;
			$this->deleteEventAutoCancel($id_ticket);
			$data = array('trang_thai' => 0);
			$this->db->where('id', $id_ticket);
			return $this->db->update('ve',$data);
		}

		public function deleteEventAutoCancel($id_ticket){
			try{
				$sql = "DROP EVENT IF EXISTS auto_cancel_".$id_ticket.";";
				if($query = $this->db->query($sql,$id_ticket)){
					return true;
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

		/*
		public function startEventScheduler(){
			try{
				$sql = "SET GLOBAL event_scheduler = ON";
				if($query = $this->db->query($sql)){
					return true;
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}
		*/

		public function checkTicketIsBooked($id_ticket){
			try{
				$sql = "SELECT trang_thai FROM ve WHERE id = ?";
				if($query = $this->db->query($sql,$id_ticket)){
					$result = $query->first_row()->trang_thai;
					if($result == 'đã đặt'){
						return true;
					} 
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

		public function layThongTinChiTietHanhTrinh($id_ticket){
			try{
				$sql = "SELECT chi_tiet_hanh_trinh.*,tau.ten_tau FROM chi_tiet_hanh_trinh,ve,tau WHERE chi_tiet_hanh_trinh.id = ve.id_chi_tiet_hanh_trinh AND tau.id = chi_tiet_hanh_trinh.id_tau AND ve.id = ?";
				if($query = $this->db->query($sql,$id_ticket)){
					return $query->first_row();
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage."<br>");
			}
			return false;
		}

		public function dataTicketsCart($id_ticket){
			try{
				$sql = "SELECT toa.ten_toa,loai_ghe.ten_loai,ghe.ten_ghe,ve.gia_ve,ve.id,ve.trang_thai FROM ve,toa,loai_ghe,ghe WHERE ve.id_toa = toa.id AND ve.id_ghe = ghe.id AND ghe.id_loai = loai_ghe.id AND ve.id = ? AND ve.trang_thai = 1";
				if($query = $this->db->query($sql,$id_ticket)){
					// echo "<pre>";
					// var_dump($query->result_array());
					// echo "</pre>";
					// $result = $query->first_row();
					// die;

					// echo "<pre>";
					// var_dump($result);
					// echo "</pre>";

					// die;
					return $query->first_row();
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage."<br>");
			}
			return false;
		}

	}
