<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scramble extends Core_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("WordsModel");
    }

	public function index()
	{
        $count = $this->session->userdata("count");
        if (isset($count)) {
            $count = (int) $count + 1;
            $this->session->set_userdata("count", $count);
        } else {
            $this->session->set_userdata("count", 1);
        }

        $score = $this->session->userdata("score");
        if (!isset($score)) {
            $this->session->set_userdata("score", 0);
        }

        $cnt = array(
            'count' => $count,
            'score' => $score
        );
        $this->load_content('scramble/index', $cnt);
	}

    public function nextword() {
        $word = $this->WordsModel->get_word();
        $this->session->set_userdata("shuffle", strtoupper($word->word));
        $shuffled = str_split(str_shuffle(strtoupper($word->word)));

        $json_data = array(
            'success' => true,
            'data' => $shuffled
        );

        header("Content-Type: application/json");
        echo json_encode($json_data);
    }

    public function checkanswer() {
        $answer = $this->input->post("answer");
        $shuffle = $this->session->userdata("shuffle");
        $score = $this->session->userdata("score");

        if ($shuffle == $answer) {
            $score = (int) $score + 1;

            $json_data = array(
                'success' => true,
                'status' => array(
                    'correct' => true,
                    'score' => $score
                )
            );
        } else {
            $score = (int) $score - 1;
            if ($score < 0) {
                $score = 0;
            }


            $json_data = array(
                'success' => true,
                'status' => array(
                    'correct' => false,
                    'score' => $score
                )
            );
        }
        $this->session->set_userdata("score", $score);

        header("Content-Type: application/json");
        echo json_encode($json_data);
    }

}
