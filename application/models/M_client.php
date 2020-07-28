<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_client extends CI_Model
{

    public function getGedungs()
    {
        $this->db->select('gedung');
        $this->db->from('client');
        $this->db->group_by('gedung');
        return $this->db->get();
    }

    public function getClients($gedung)
    {
        $this->db->select('*');
        $this->db->from('client');
        if ($gedung != null) {
            $this->db->where('gedung', $gedung);
        }
        return $this->db->get();
    }
}
