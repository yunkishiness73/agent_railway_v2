<?php 
	class Ajax_rendering extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('ve_model');
		}

		function createTabToa(){
			try{
				if(!empty($_POST['id_chi_tiet_hanh_trinh'])){
					$id = $_POST['id_chi_tiet_hanh_trinh'];
					unset($_POST);
					$data1 = $this->ve_model->timToa($id);
					$result = $this->renderingToa($data1);
					echo $result;
				}
			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
			return false;
		}

		function createVe(){
			try{
				if(isset($_POST['id_chi_tiet_hanh_trinh'])){
					$id = $_POST['id_chi_tiet_hanh_trinh'];
					unset($_POST);
					$data = $this->ve_model->timToa($id);
					$result = $this->createAllTicketByTrain($id,$data);
					echo $result;
					//$this->renderVe($data);
				}else{
					die("Wrong in create tickets");
				}
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}
		

		function renderingToa($data){
			try{
				$view_toa = "";
				$view_ve = "";
				$count = 0;
				$signal = 0;
				foreach ($data as $item) {
					if($count == 0){
						$view_toa .= "
						<li class='nav-item pb-2 ml-2'>
						<a class='nav-link active' href='#toa".$item['id']."' id='pills-toa".$item['id']."-tab' data-toggle='pill' role='tab' aria-controls='toa".$item['id']."' aria-selected='true'>".$item['ten_toa']."(".$item['so_luong_ve'].")"."</a>
						</li>
						";
						$view_ve .= '<td rowspan="100%" style="width: 50px;background-color: #eeeeee;"></td>';
						
						$view_ve .= '<td rowspan="100%" style="width: 50px;background-color: #eeeeee;"></td>';
						$count = 1;
					}else{
						$view_toa .= "
						<li class='nav-item pb-2 ml-2'>
						<a class='nav-link' href='#toa".$item['id']."' id='pills-toa".$item['id']."-tab' data-toggle='pill' role='tab' aria-controls='toa".$item['id']."' aria-selected='true'>".$item['ten_toa']."(".$item['so_luong_ve'].")"."</a>
						</li>
						";
					}
					
				}
				return $view_toa;
			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
			return false;
		}


		function renderVe($id_toa,$tickets,$first=false){
			$ve_table = "";
			if($first){
				$ve_table .= "<div class='tab-pane fade show active tau' id='toa".$id_toa."' role='tabpanel' arial-labelledby='pills-menu1-tab'>
   								<table>
   									<thead>
   										
   									</thead>
   									<tbody>";
   			}else{
   				$ve_table .= "<div class='tab-pane fade tau' id='toa".$id_toa."' role='tabpanel' arial-labelledby='pills-menu1-tab'>
   								<table>
   									<thead>
   										
   									</thead>
   									<tbody>";
   			}
   							
  							
   			foreach($tickets as $ticket){
   				
   				if(intval($ticket['id_ghe'])%4 == 1){
   					$ve_table = "<tr>".$ve_table;
   				}

   				if(intval($ticket['id_ghe']) == 1){
   					$ve_table .= "<td rowspan='100%'' style='width: 50px;background-color: #eeeeee;''></td>";
   				}

   				if($ticket['trang_thai'] == 0){
   					$ve_table .= "<td>
   								<div data-ticket='".$ticket['id']."' data-ten-toa='".$ticket['ten_toa']."' data-ten-loai-ghe='".$ticket['ten_loai']."' data-gia-ve='".$ticket['gia_ve']."' class='ghe ghe-co-san' id='ghe-so-".$ticket['id_ghe']."'>".$ticket['id_ghe']."</div>
   							  </td>";
   				}else{
   					$ve_table .= "<td>
   								<div data-ticket='".$ticket['id']."' data-ten-toa='".$ticket['ten_toa']."' data-ten-loai-ghe='".$ticket['ten_loai']."' data-gia-ve='".$ticket['gia_ve']."' class='ghe ghe-da-dat' id='ghe-so-".$ticket['id_ghe']."'>".$ticket['id_ghe']."</div>
   							  </td>";
   				}
			  	

   				if(intval($ticket['id_ghe'])%4 == 2){
   					$ve_table .= "<td style='width: 20%;'></td>";
   				}			  		  

   				if(intval($ticket['id_ghe']) == 4){
   					$ve_table .= "<td rowspan='100%'' style='width: 50px;background-color: #eeeeee;''></td>";
   				}

   				if(intval($ticket['id_ghe'])%4 == 0){
   					$ve_table .= "</tr>";
   				}

   				if(intval($ticket['id_ghe'])%8 == 0){
   					$ve_table .= "<tr>
   										<td colspan='5' align='center'>
   											<div>Cabin ".(($ticket['id_ghe'])/8)."</div>
   										</td>
   								</tr>
   								<tr style='height: 5px;'>
   									<td colspan='5' style='background-color: #333;''></td>
   								</tr>";
   				}
   			}
   			$ve_table .= "			</tbody>
   									<tfoot></tfoot>
   								</table>
   							</div>                                                                ";

   			return $ve_table;
		}

		function createAllTicketByTrain($id_chi_tiet_hanh_trinh,$toas){
			$result = "";
			$first = true;
			foreach($toas as $toa){
				$tickets = $this->ve_model->timVe($id_chi_tiet_hanh_trinh,$toa['id']);
				$result .= $this->renderVe($toa['id'],$tickets,$first);
				$first = false;
			}

			return $result;
		}


	}


