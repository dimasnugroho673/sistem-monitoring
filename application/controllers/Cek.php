<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{

	public function index()
	{
		// $this->load->view('dibug/cek_ip');

		// ini isi bodynya
		$data['page_view'] = 'cek/index';


		$this->load->view('layout/main', $data);
	}

	private function _checkIP($get_ip)
	{
		$host = $get_ip;
		$res = exec("ping -n 1 " . $host);
		$data['status'] = [];
		$data['ip'] = $host;

		if (preg_match('/\bReceived = 0\b/', $res) || preg_match('/\bnot\b/', $res)) {
			return $data['status'] = [
				'status' => 'failed',
				'msg' => $res
			];
		} else if (preg_match('/\bMinimum = 0ms\b/', $res)) {
			return $data['status'] = [
				'status' => 'failed',
				'msg' => $res
			];
		} else {
			return $data['status'] = [
				'status' => 'success',
				'msg' => $res
			];
		}
	}

	public function cekIp()
	{

		// ini isi bodynya
		$data['page_view'] = 'cek/status';
		// $data['status'] = $this->_checkIP($this->input->get('ip'));


		$data['status_connection'] = $this->db->get('connection_status')->result();


		$this->load->view('layout/main', $data);
	}

	// AJAX REQUEST
	public function check_status_ip()
	{
		$ip = $this->input->post('ip');

		$conn = @fsockopen($ip, 80);

		if ($conn) {
			$status = 'up';
			fclose($conn);
		} else {
			$status = 'down';
		}


		echo json_encode([
			'ip' => $ip,
			'status' => $status
		]);
	}


	public function get_ip_background()
	{
		$ip = $this->input->post('ip');

		// $dataInsert = $this->_checkIP($ip);

		$dataInsert = array(
			'ip' => 1,
			'message' => 1,
			'speed' => null
		);

		$this->db->insert('connection_speed', $dataInsert);

		echo "hai";
	}
}
