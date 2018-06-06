<?php

function get_jumlah_sks_pengajaran($id_identitas='')
{
	$ci =&get_instance();
	$ci->load->model('pengajaran');
	$result = $ci->pengajaran->get_jumlah_sks($id_identitas);
	if (isset($result['SKS'])) {
		return $result['SKS'];
	}else{
		return 0;
	}
}

function get_jumlah_sks_penelitian($id_identitas='')
{
	$ci =&get_instance();
	$ci->load->model('penelitian');
	$result = $ci->penelitian->get_jumlah_sks($id_identitas);
	if (isset($result['SKS'])) {
		return $result['SKS'];
	}else{
		return 0;
	}
}

function get_jumlah_sks_pengabdian($id_identitas='')
{
	$ci =&get_instance();
	$ci->load->model('pengabdian_masyarakat');
	$result = $ci->pengabdian_masyarakat->get_jumlah_sks($id_identitas);
	if (isset($result['SKS'])) {
		return $result['SKS'];
	}else{
		return 0;
	}
}

function get_jumlah_sks_penunjang($id_identitas='')
{
	$ci =&get_instance();
	$ci->load->model('penunjang');
	$result = $ci->penunjang->get_jumlah_sks($id_identitas);
	if (isset($result['SKS'])) {
		return $result['SKS'];
	}else{
		return 0;
	}
}

