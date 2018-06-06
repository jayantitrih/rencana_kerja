<?php
  class Mod_Login extends CI_Model {
 
      function cek($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("user");
      }
 
      function getLoginData($usr, $psw) {
        $u = $usr;
        $p = md5($psw);
        $q_cek_login = $this->db->get_where('user', array('username' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
          foreach ($q_cek_login->result() as $qck) {
            foreach ($q_cek_login->result() as $qad) {
              $sess_data['logged_in'] = TRUE;
              $sess_data['id_pengguna'] = $qad->id_pengguna;
              $sess_data['username'] = $qad->username;
              $sess_data['password'] = $qad->password;
              $sess_data['nama_pengguna'] = $qad->nama_pengguna;
              $sess_data['level'] = $qad->level;
              $this->session->set_userdata($sess_data);
            }
          redirect('admin');
          }
        } else {
            $this->session->set_flashdata('result_login', '
Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
          }
      }

      function users(){
        $this->db->where('username', $username);
      $this->db->where('active', '1');
      
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan username yang sesuai 
      // maka return false
      if (!$query) return false;
      
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;
 
      // Jika username dan password benar maka return data user
      return $query;        
      }
  }
?>