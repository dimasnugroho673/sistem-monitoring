<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_client');
	}

	public function index()
	{
		// ini isi bodynya
		$data['page_view'] = 'client/client';
		$data['gedungs'] = $this->M_client->getGedungs()->result();

		$this->load->view('layout/main', $data);
	}

	public function add()
	{
		$this->db->insert('client', [
			'nama_client' 	=> $this->input->post('nama_client'),
			'ip'			=> $this->input->post('ip'),
			'gedung'		=> $this->input->post('gedung'),
			'status' 		=> $this->_checkip($this->input->post('ip'))
		]);

		$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah
	  </div>');
		redirect('client');
	}

	public function edit()
	{

		$data = [
			'ip'			=> $this->input->post('ip'),
			'nama_client' 	=> $this->input->post('nama_client'),
			'gedung'		=> $this->input->post('gedung'),
		];

		$this->db->where('id_client', $this->input->post('id_client'));
		$this->db->update('client', $data);


		$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">
		Data berhasil dirubah
	  </div>');
		redirect('client');
	}

	public function delete()
	{

		$this->db->where('id_client', $this->input->post('id_client'));
		$this->db->delete('client');


		$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">
		Data berhasil dihapus
	  </div>');
		redirect('client');
	}

	private function _checkip($ip)
	{
		$conn = @fsockopen($ip, 80);

		if ($conn) {
			return 'up';
			fclose($conn);
		} else {
			return 'down';
		}
	}

	private function _greetingMessage()
	{

		date_default_timezone_set("Asia/Jakarta");

		$b = time();
		$hour = date("G", $b);

		if ($hour >= 0 && $hour <= 11) {
			return "Selamat Pagi :)";
		} elseif ($hour >= 12 && $hour <= 14) {
			return "Selamat Siang :) ";
		} elseif ($hour >= 15 && $hour <= 17) {
			return "Selamat Sore :) ";
		} elseif ($hour >= 17 && $hour <= 18) {
			return "Selamat Petang :) ";
		} elseif ($hour >= 19 && $hour <= 23) {
			return "Selamat Malam :) ";
		}
	}


	// ajax request
	public function list_client()
	{
		$gedung = $this->input->post('gedung');
		$data = $this->M_client->getClients($gedung)->result();
		echo json_encode($data);
	}

	public function get_client()
	{
		$id_client = $this->input->post('id_client');
		$data = $this->db->get_where('client', [
			'id_client' => $id_client
		])->row();

		echo json_encode($data);
	}

	public function update_status()
	{
		$dot_red = '<svg height="50" width="50">
		<circle cx="15" cy="15" r="10" stroke-width="3" fill="#DC3545">
	  </svg>';

		$dot_green = '<svg height="50" width="50">
		<circle cx="15" cy="15" r="10" stroke-width="3" fill="#28A745">
	  </svg>';

		$data_status = $this->db->get('client')->result();

		foreach ($data_status as $ds) {
			$this->db->set('status', $this->_checkip($ds->ip));
			if ($this->_checkip($ds->ip) == 'up') {
				$this->db->set('simbol', $dot_green);
			} else {
				$this->db->set('simbol', $dot_red);
			}
			$this->db->where('id_client', $ds->id_client);
			$this->db->update('client');

			$this->db->set('waktu_gangguan', time());
			$this->db->where('status', 'down');
			$this->db->update('client');
		}


		// ============================================= 

		$data_connection_down = $this->db->get_where('client', [
			'status' => 'down'
		]);

		$web_config = $this->db->get('web_config')->row();


		$greeting = $this->_greetingMessage();

		if ($data_connection_down->num_rows() > 0) {
			if (time() - $web_config->latest_notif < (60 * 60 * 2)) {

				foreach ($data_connection_down->result() as $cd_c) {
					if (time() - $cd_c->waktu_gangguan < (60 * 60 * 2)) {
					} else {
						// $message_to_send_notif = $greeting . '. Laporan jaringan down pada pukul ' . date('d F Y H:i:s', time()) . '. dengan jaringan yaitu : 


						// 	- ' . $cd_c->ip . ' Gedung ' . strtoupper($cd_c->gedung) . '. 


						// Dimohon segera memperbaiki untuk kenyamanan para pengguna :)';
						// $this->sendNotif($message_to_send_notif);
					}
				}
			} else {
				foreach ($data_connection_down->result() as $cd) {
					$message_to_send_notif = $greeting . '. Laporan jaringan down pada pukul ' . date('d F Y H:i:s', time()) . '. dengan jaringan yaitu : 


							- ' . $cd->ip . ' Gedung ' . strtoupper($cd->gedung) . '. 
						
	
						Dimohon segera memperbaiki untuk kenyamanan para pengguna :)';
					$this->sendNotif($message_to_send_notif);
				}


				$this->db->set('latest_notif', time());
				$this->db->where('id_config', 1);
				$this->db->update('web_config');

				$this->db->set('waktu_gangguan', time());
				$this->db->where('status', 'down');
				$this->db->update('client');
			}
		}
	}

	public function sendMessage($telegram_id, $message_text, $secret_token)
	{

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=" . urlencode($message_text);
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);
	}

	// api telegram
	public function sendNotif($message_text)
	{
		$telegram_id = '-1001120735463';
		$secret_token = "967746824:AAEm5PeQGc1obzwSduK4mtn3nbKEnK8YJS0";
		$this->sendMessage($telegram_id, $message_text, $secret_token);
	}
}
