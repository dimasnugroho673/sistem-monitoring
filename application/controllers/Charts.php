<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller { 

    public function index()
    {
            // ini isi bodynya
            $data['page_view'] = 'charts/index';
            
            $this->load->view('layout/main', $data);
    }

}