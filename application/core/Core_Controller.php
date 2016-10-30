<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Core_Controller extends CI_Controller {

    protected $layout = "default";
    protected $is_logged = false;

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

    public function auth_check()
    {
        $this->is_logged = $this->session->userdata("is_logged");
        if (!isset($this->is_logged) || (isset($this->is_logged) && $this->is_logged == false)) {
            redirect(url("auth", false));
        }
    }

	public function load_content($view = "", $cnt = null, $hdr = array(), $ftr = array())
    {
        $header = array();
        $this->load->view('layouts/' . $this->layout . '/header', array_merge($hdr, $header));

        if (!empty($view)) {
            $this->load->view('contents/' . $view, $cnt);
        }

        $footer = array(
            'copyright' => '&copy; G12 Team.'
        );

        $this->load->view('layouts/' . $this->layout . '/footer', array_merge($ftr, $footer));
    }
    	
}
