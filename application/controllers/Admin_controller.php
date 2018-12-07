<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{

		$this->load->view('dashboard');
	}

	public function load_ChiTietHanhTrinh_View() {
		$route = $this->Admin_model->getRouteFromDB('tuyen');
		$train = $this->Admin_model->getTableFromDB('tau');
		$journeys = $this->Admin_model->getJourneysFromDB();
		$data = array(
			'journeys' => $journeys,
			'route' => $route,
			'train' => $train,
			);
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die;
		$this->load->view('Chitiet_hanhtrinh', $data);
	}

	public function load_QuanliNhaGa_View() {
		$data = $this->Admin_model->getStationFromDB();
		$data = array('station' => $data);
		$this->load->view('Quanli_nhaga', $data);
	}

	public function load_QuanliTuyenTau_View() {
		$data = $this->Admin_model->getRouteFromDB();

		$data = array('route' => $data);

		$this->load->view('Quanli_tuyentau', $data);
	}

	public function load_QuanliKhachHang_View() {
		$data = $this->Admin_model->getTableFromDB('khach_hang');
		$data = array('customer' => $data);
		$this->load->view('Quanli_khachhang', $data);
	}

	public function load_QuanliVe_View() {

		$result = $this->Admin_model->getStationFromDB();
		$data = array(
			'ga' => json_encode($result)
			);
		$this->load->view('Quanli_ve', $data);
	}

	public function load_TheoKeTheoNgay_View() {
		$data = $this->Admin_model->getRevenueByDay();
		$data = array('data' => json_encode($data));
		$this->load->view('Thongke_theongay', $data);
	}

	public function load_ThongKeTheoThang_View() {
		$data = $this->Admin_model->getRevenueByMonth();
		$data = array('data' => json_encode($data));
		$this->load->view('Thongke_theothang',$data);
	}

	public function load_ThongKeTheoNam_View() {
		$data = $this->Admin_model->getRevenueByYear();
		$data = array('data' => json_encode($data));
		$this->load->view('Thongke_theonam',$data);
	} 

	public function insertStationByAjax() {
		$ten_ga = $this->input->post('ten_ga');
		$khoang_cach = $this->input->post('khoang_cach');
		$so_thu_tu = $this->input->post('so_thu_tu');

		$this->Admin_model->insertStation($ten_ga, $khoang_cach, $so_thu_tu);
		
	}

	public function removeStationByAjax() {
		$ten_ga = $this->input->post('ten_ga');
		if($this->Admin_model->removeStation($ten_ga))
			echo '1';
		else 
			echo '0';
	}

	public function insertJourney() {

		$id_tuyen = $this->input->post('id_tuyen');
		$id_tau = $this->input->post('id_tau');
		$gia_ve = $this->input->post('gia_ve');
		$ngay_khoi_hanh = $this->input->post('ngay_khoi_hanh');
		$gio_khoi_hanh = $this->input->post('gio_khoi_hanh');
		$ngay_den = $this->input->post('ngay_den');
		$gio_den = $this->input->post('gio_den');

		if($this->Admin_model->insertJouneysIntoDB($id_tuyen, $id_tau, $gia_ve, $ngay_khoi_hanh, $gio_khoi_hanh, $ngay_den, $gio_den))
			echo '1';
		else
			echo '0';

	}

	public function logIn() {
		$this->load->view('login');
	}

	public function checkUserAccount() {

		if(isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$account = $this->Admin_model->getAccountFromDB($username, $password);
			if($account != NULL) {
				$this->session->set_userdata('manager', $account);
				redirect(site_url('Admin_controller'),'refresh');

			} else {
				redirect(site_url('Admin_controller/logIn'),'refresh');
			} 


		}
	}

	public function logOut() {
		unset($_SESSION['manager']);
		redirect(site_url('Admin_controller/logIn'),'refresh');
	}

	public function editJourney() {

		$id = $this->input->post('id');
		$id_tau = $this->input->post('id_tau');
		$gia_ve = $this->input->post('gia_ve');
		$ngay_khoi_hanh = $this->input->post('ngay_khoi_hanh');
		$gio_khoi_hanh = $this->input->post('gio_khoi_hanh');
		$ngay_den = $this->input->post('ngay_den');
		$gio_den = $this->input->post('gio_den');

		$result = $this->Admin_model->editJourneyById($id, $id_tau, $gia_ve, $ngay_khoi_hanh, $gio_khoi_hanh, $ngay_den, $gio_den);
		if($result != 0)
			echo $result;
		else 
			echo 0;
		
	}

	public function search() {

		if(isset($_GET['f']) && isset($_GET['t']) && isset($_GET['d'])) {

			$ten_ga_di = $this->input->get('f');
			$ten_ga_den = $this->input->get('t');
			$ngay_khoi_hanh = $this->input->get('d');
		}

		$data = $this->Admin_model->getTicketsFromDB($ten_ga_di,$ten_ga_den,$ngay_khoi_hanh);
		$result = $this->Admin_model->getStationFromDB();

		$data = array(
			'tickets' => $data,
			'ga' => json_encode($result)
		);

		$this->load->view('Quanli_ve', $data);

	}


	




}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin_controller.php */