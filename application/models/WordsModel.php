<?php defined('BASEPATH') OR exit('No direct script access allowed');

class WordsModel extends Core_Model {

    function __construct() {
        parent::__construct();

        $this->table_name = "words";
    }

    function get_word() {
        $result = null;

        $query = $this->db->query("SELECT * FROM " . $this->table_name . " ORDER BY RAND() LIMIT 1");
        $results = $query->result();
        if (isset($results) && is_array($results) && count($results) > 0) {
            $result = $results[0];
        }

        return $result;
    }

}