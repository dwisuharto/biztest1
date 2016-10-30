<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Core_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("UsersModel");
    }

    public function index()
    {
        $cnt = array();
        $this->load_content('auth/index', $cnt);
    }

    public function signin()
    {
        $uname = $this->input->post("signinUname", true);
        $paswd = $this->input->post("signinPaswd", true);

        $criteria = array
        (
            'uname' => $uname
        );
        $users = $this->UsersModel->get_by_criteria($criteria, null, 0, 1);
        if (isset($users) && is_array($users) && count($users) > 0) {
            if (md5($paswd) == $users[0]->paswd) {
                $this->session->set_userdata("uname", $users[0]->uname);
                $this->session->set_userdata("user_id", $users[0]->id);
                $this->session->set_userdata("is_logged", true);
            }
        }

        redirect(url("admin", false));
    }

    public function signout() {
        if (!isset($this->is_logged) || (isset($this->is_logged) && $this->is_logged == false)) {
            $this->session->unset_userdata("uname");
            $this->session->unset_userdata("user_id");
            $this->session->unset_userdata("is_logged");

            redirect(url("admin", false));
        }
    }

}
