<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends Core_Model {

    function __construct() {
        parent::__construct();

        $this->table_name = "users";
    }

}