<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_profil_by_id($user_id)
    {
        $this->db->where('id', $user_id);
        // Menggunakan row_array() karena kita hanya mengambil 1 baris data pengguna
        return $this->db->get('users')->row_array(); 
    }

}