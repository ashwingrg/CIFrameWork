<?php
class Signup extends CI_Controller
{
    public function index()
    {
        if($this->session->userdata("name"))
        {
            echo $this->session->userdata("name"); //get session
            //$this->session->unset_userdata("name"); //unset session
        }
        else
        {
            echo "Not Set.";
        }
        //exit;
        $this->load->model("UserAccount/User"); //loading class of model
        $usr = new User();
        //$arr = $usr->Select();
       // print_r($arr);
        //echo $arr[1]->getName();
        //exit;
        $top = "Framewok/Signup:-";


        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $uid = $this->input->post("uid");
            $username = $this->input->post("username");//array
            $password = $this->input->post("signuppsw");
            $name = $this->input->post("name");
            $user_type = $this->input->post("user_type");
            $user_role = $this->input->post("user_role");
            $user_status = $this->input->post("user_status");
            $user_timestamp = $this->input->post("user_timestamp");

            $this->load->model("UserAccount/User"); //loading class of model
            $usr = new User(); //creating object of class User of model
            $usr->setUid($uid);
            $usr->setUsername($username);
            $hashPassword = hash("sha512",$password);
            $usr->setPsw($hashPassword);
            $usr->setName($name);
            $usr->setUserType($user_type);
            $usr->setUserRole($user_type);
            $usr->setUserStatus($user_status);
            $usr->setTimeStamp($user_timestamp);
            if($usr->Insert() >= 1)
            {


            }
            else
            {

            }
        }
        else
        {
            $uid="";
            $username="";
            $password="";
            $name="";
            $user_type="";
            $user_role="";
            $user_status="";
            $user_timestamp="";
        }

        $this->load->view("UserAccount/Signup",array("top"=>$top,"uid"=>$uid,"username"=>$username,"password"=>$password,"name"=>$name,"user_type"=>$user_type,"user_role"=>$user_role,"user_status"=>$user_status,"user_timestamp"=>$user_timestamp));
    }
}