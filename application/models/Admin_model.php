<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function getTableFromDB($table) {
		$this->db->select('*');
		$result = $this->db->get($table);
		return $result->result_array();
	}

	public function getJourneysFromDB() {

		$query = $this->db->query("
			SELECT *, ctht.id FROM chi_tiet_hanh_trinh ctht, tuyen t, tau
			WHERE ctht.id_tau = tau.id
			AND ctht.id_tuyen = t.id
			ORDER BY ctht.id
			");

		return $query->result_array();
	}

	public function getStationFromDB() {
		$this->db->select('*');
		$this->db->where('trang_thai', 1);
		$result = $this->db->get('ga');
		return $result->result_array();
	}

	public function getRouteFromDB() {
		$this->db->select('*');
		$this->db->where('trang_thai', 1);
		$result = $this->db->get('tuyen');
		return $result->result_array();
	}

	public function getTicketsFromDB($ten_ga_di,$ten_ga_den,$ngay_khoi_hanh) {
		$query = $this->db->query("
			SELECT chi_tiet_hanh_trinh.*,tau.ten_tau,COUNT(ve.id) AS 'so_luong_ghe', tuyen.ten_tuyen FROM chi_tiet_hanh_trinh,tuyen,tau,ve 
			WHERE chi_tiet_hanh_trinh.id_tuyen = tuyen.id AND chi_tiet_hanh_trinh.id_tau = tau.id AND chi_tiet_hanh_trinh.id = ve.id_chi_tiet_hanh_trinh AND tuyen.id_ga_di = (SELECT ga.id FROM ga WHERE ga.ten_ga = '$ten_ga_di') AND tuyen.id_ga_den = (SELECT ga.id FROM ga WHERE ga.ten_ga = '$ten_ga_den') AND chi_tiet_hanh_trinh.ngay_khoi_hanh = '$ngay_khoi_hanh' AND ve.trang_thai = 'có sẵn' GROUP BY chi_tiet_hanh_trinh.id;
			");
		return $query->result_array();
	}


	public function insertStation($ten_ga, $khoang_cach, $so_thu_tu) {

		$query = $this->db->query("
			call insert_ga('$ten_ga','$khoang_cach','$so_thu_tu');
			");
		
		return $query;
	}

	public function removeStation($ten_ga) {
		$data = array('trang_thai' => 0);
		$this->db->where('ten_ga', $ten_ga);
		return $this->db->update('ga', $data);
	}

	public function getAccountFromDB($username, $password) {

		$query = $this->db->query("
			SELECT * FROM tai_khoan
			WHERE username = '$username' AND password = '$password'
			");

		return $query->result_array();

	}

	public function insertJouneysIntoDB($id_tuyen, $id_tau, $gia_ve, $ngay_khoi_hanh, $gio_khoi_hanh, $ngay_den, $gio_den) {
		$journey = array(
			'id_tuyen' => $id_tuyen,
			'id_tau' => $id_tau,
			'gia_ve' => $gia_ve,
			'ngay_khoi_hanh' => $ngay_khoi_hanh,
			'gio_khoi_hanh' => $gio_khoi_hanh,
			'ngay_den' => $ngay_den,
			'gio_den' => $gio_den
			);

		// echo "<pre>";
		// var_dump($journey);
		// echo "</pre>";

		// die;

		$this->db->insert('chi_tiet_hanh_trinh', $journey);
		return $this->db->insert_id();
	}

	public function editJourneyById($id, $id_tau, $gia_ve, $ngay_khoi_hanh, $gio_khoi_hanh, $ngay_den, $gio_den ) {

		$journey = array(
			'id_tau' => $id_tau,
			'gia_ve' => $gia_ve,
			'ngay_khoi_hanh' => $ngay_khoi_hanh,
			'gio_khoi_hanh' => $gio_khoi_hanh,
			'ngay_den' => $ngay_den,
			'gio_den' => $gio_den
			);

		$this->db->where('id', $id);
		return $this->db->update('chi_tiet_hanh_trinh', $journey);

	}

	public function getRevenueByDay() {

		$query = $this->db->query("
			SELECT DAY(ngay_khoi_hanh) ngay, SUM(ve.gia_ve) tong_tien, COUNT(*) so_luong FROM ve, chi_tiet_hanh_trinh ctht
			WHERE ve.id_chi_tiet_hanh_trinh = ctht.id
			AND ve.trang_thai = 1
			AND MONTH(ctht.ngay_khoi_hanh) = MONTH(CURDATE())
			GROUP BY DAY(ngay_khoi_hanh)

		");

		return $query->result_array();
	
	}

	public function getRevenueByMonth() {

		$query = $this->db->query("
			SELECT MONTH(ngay_khoi_hanh) thang, SUM(ve.gia_ve) tong_tien, COUNT(*) so_luong FROM ve, chi_tiet_hanh_trinh ctht
			WHERE ve.id_chi_tiet_hanh_trinh = ctht.id
			AND ve.trang_thai = 1
			AND YEAR(ctht.ngay_khoi_hanh) = YEAR(CURDATE())
			GROUP BY MONTH(ngay_khoi_hanh)
		");

		return $query->result_array();
	
	}

	public function getRevenueByYear() {

		$query = $this->db->query("
			SELECT YEAR(ngay_khoi_hanh) nam, SUM(ve.gia_ve) tong_tien, COUNT(*) so_luong FROM ve, chi_tiet_hanh_trinh ctht
			WHERE ve.id_chi_tiet_hanh_trinh = ctht.id
			AND ve.trang_thai = 1
			GROUP BY YEAR(ngay_khoi_hanh)
		");

		return $query->result_array();
	
	}



}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */