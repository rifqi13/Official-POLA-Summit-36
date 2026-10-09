<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCountry()
    {
        return $this->db->get('country')->result_array();
    }

    public function TambahData($insert_data)
    {
        $result = $this->db->insert('registrasi_pola', $insert_data);

        // DEBUG: Cek error jika gagal
        if (!$result) {
            echo "Error: " . $this->db->error()['message'];
            die();
        }
        
        return $result;
    
    }

    public function get_last_insert_id() {
        return $this->db->insert_id();
    }

}