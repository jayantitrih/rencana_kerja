<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Membuat Login Dengan Codeigniter & Bootsrap</title>
  </head>
  <body>
    <h1>Membuat Login Dengan Codeigniter & Bootstrap</h1>
    <h2><?php echo $this->session->flashdata('success'); ?></h2>
    <h2>Hai, <?php echo $this->session->userdata('nama_pengguna'); ?></h2>
    <a href="<?php echo base_url('admin/logout'); ?>">Logout</a>
  </body>
</html>