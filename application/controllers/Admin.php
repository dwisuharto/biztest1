<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Core_Controller {

    function __construct() {
        parent::__construct();

        $this->auth_check();

        $this->layout = "admin";
    }

    public function index()
    {
        $cnt = array();
        $this->load_content('admin/index', $cnt);
    }
}
