<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {



   public function check_login($email, $password) {
    // 1. Cari user berdasarkan email
    $this->db->where('email', $email);
    $user = $this->db->get('users')->row();

    // JIKA USER TIDAK DITEMUKAN
    if (!$user) {
        echo "Lacak Error: Email tidak ditemukan di database!";
        die();
    }

    // JIKA USER DITEMUKAN, CEK PASSWORD
    if ($user) {
        // Kita tes manual apakah fungsi ini menghasilkan TRUE atau FALSE
        $cek_password = password_verify($password, $user->password);
        
        if ($cek_password) {
            return $user; // Sukses
        } else {
            echo "Lacak Error: Email ada, tapi Password salah!<br>";
            echo "Password Input: " . $password . "<br>";
            echo "Password di DB: " . $user->password . "<br>";
            die();
        }
    }
    return FALSE;
}


    public function insert_user($data) {
    // Hapus baris password_hash di sini karena sudah dilakukan di Controller
    $this->db->insert('users', $data);
    
    // Mengembalikan ID terakhir yang otomatis digenerate oleh MySQL (Auto Increment)
    return $this->db->insert_id();
}

}