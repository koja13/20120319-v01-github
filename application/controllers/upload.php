<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'txt';
	//	$config['max_size']	= '100000';
	//	$config['max_width']  = '1024';
	//	$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$posalji = $data['upload_data'];
			$put['s'] = $posalji['full_path'];
			
			

			$this->load->model('iscitaj', '', $put);
			$data['sadrzaj'] = $this->iscitaj->iscitaj();
			$this->load->view('upload_success', $data);
		}
	}
}
?>