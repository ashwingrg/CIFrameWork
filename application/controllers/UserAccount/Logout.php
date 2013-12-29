<?php
class Logout extends CI_Controller
{
    public function index()
    {
        //$this->load->view("UserAccount/Logout");
        $this->session->unset_userdata("is_login");
        $this->session->unset_userdata("name");
        $this->session->unset_userdata("username");
        redirect("/");
    }
}