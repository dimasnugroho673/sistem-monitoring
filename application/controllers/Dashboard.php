<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// ini isi bodynya
		$data['page_view'] = 'dashboard/index';
		
		$this->load->view('layout/main', $data);
	}
}
