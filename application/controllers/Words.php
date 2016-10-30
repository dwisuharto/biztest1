<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Words extends Core_Controller {

    function __construct() {
        parent::__construct();

        $this->auth_check();

        $this->layout = "admin";
        $this->load->model("WordsModel");
    }

    public function index()
    {
        $words = $this->WordsModel->get_all();

        $cnt = array(
            'words' => $words
        );
        $this->load_content('words/index', $cnt);
    }

    public function add() {
        $cnt = array();
        $this->load_content('words/add', $cnt);
    }

    public function edit($id = "") {
        $word = $this->WordsModel->get_one("id", $id);

        $cnt = array(
            'word' => $word
        );
        $this->load_content('words/edit', $cnt);
    }

    public function save() {
        $id = $this->input->post("id");
        $word = $this->input->post("word");

        $data = array(
            'word' => $word
        );

        if (!empty($id)) {
            $criteria = array(
               'id' => $id
            );
            $this->WordsModel->update($data, $criteria);
        } else {
            $this->WordsModel->insert($data);
        }

        redirect(url("words", false));
    }

    public function del($id = "") {
        $word = $this->WordsModel->get_one("id", $id);
        if (isset($word)) {
            $this->WordsModel->real_delete(array('id' => $id));
        }

        redirect(url("words", false));
    }

}
