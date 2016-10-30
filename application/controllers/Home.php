<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Core_Controller {

	public function index()
	{
		$cnt = array();
		$this->load_content('home/index', $cnt);
	}
}
