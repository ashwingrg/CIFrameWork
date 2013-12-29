<?php
    class Profile extends CI_Controller
    {
        public function index()
        {
            if($this->session->userdata("is_login"))
            {

                $this->load->view("UserAccount/Profile", array("name"=>$this->session->userdata("name"),"pic"=>$this->session->userdata("pic")));
            }
            else
            {
                redirect("/login");
            }

        }
    }
?>