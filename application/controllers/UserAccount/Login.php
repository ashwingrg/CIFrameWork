<?php
class Login extends CI_Controller
{
    public function index()
    {
        //$this->session->set_userdata("name","Ram Thapa");//set session
        //$title = "Framework/login:-";
        /**getting data from view..login.php**/
        if($this->session->userdata("is_login"))
        {
            redirect("/profile");
        }
        else
        {
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                //$username = $_POST["username"];
                $username = $this->input->post("username");//post method of view..login.php
                $loginpsw=$this->input->post("loginpsw");

                $this->load->model("UserAccount/User");
                $usr = new User();
                $usr->setUsername($username);
                $usr->setPsw(hash("sha512",$loginpsw));
                $data = $usr->Login();
                if(count($data) == 1)
                {
                    $this->session->set_userdata("is_login",true);
                    $this->session->set_userdata("name",$data[0]->getName());
                    $this->session->set_userdata("pic",$data[0]->getPic());
                    $this->session->set_userdata("uid",$data[0]->getUid());
                    $this->session->set_userdata("username",$data[0]->getUsername());
                    redirect("/profile");
                }
                else
                {
                    $msg =  "Invalid usrname or password.";
                    $this->load->view("UserAccount/Login",array("name"=>$username,"psw"=>$loginpsw,"msg"=>$msg));
                }
            }
            else
            {
                $username = "";
                $loginpsw = "";
                $this->load->view("UserAccount/Login",array("name"=>$username,"psw"=>$loginpsw));
            }
        }


        //sending data to view..login.php
    }
}