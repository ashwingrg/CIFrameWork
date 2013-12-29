<?php
class Users extends CI_Controller
{
    public function index()
    {
        if($this->session->userdata("is_login"))
        {
            //Load Model
            $this->load->model("UserAccount/User");
            $usr = new User();
            $data = $usr->Select();
            $this->load->view("UserAccount/Users", array("name"=>$this->session->userdata("name"),"data"=>$data));
        }
        else
        {
            redirect("/login");
        }

    }
    public function update($user_id)
    {
        if($this->session->userdata("is_login"))
        {
            //Load Model
            $this->load->model("UserAccount/User");
            $usr = new User();
            $msg = false;
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $name = $this->input->post("name");
                $usr->setUid($user_id);
                $usr->setName($name);
                $usr->Update();
                $msg = true;

            }
            $data = $usr->SelectId($user_id);
            $this->load->view("UserAccount/ProfileUpdate", array("name"=>$this->session->userdata("name"),"data"=>$data, "msg"=>$msg));
        }
        else
        {
            redirect("/login");
        }
    }
    public function Profile_Picture()
    {
        if($this->session->userdata("is_login"))
        {
            //Load Model
            $this->load->model("UserAccount/User");
            $usr = new User();
            $msg = false;
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $config['upload_path'] = './pics/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '100';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("myPic"))
                {
                    $error = $this->upload->display_errors();
                }
                else
                {
                    $data = $this->upload->data();
                    $filename = $data["file_name"];
                    $usr->setUid($this->session->userdata("uid"));
                    $usr->setPic($filename);
                    $usr->UpdatePic();
                    $msg = true;
                }
            }
            @$this->load->view("UserAccount/Pic", array("name"=>$this->session->userdata("name"), "msg"=>$msg, 'error'=>$error));

        }
        else
        {
            redirect("/login");
        }
    }
    public function sendMail()
    {
        $this->load->library('email');

        $this->email->from('dpakmalla@gmail.com', 'Dipak Malla');
        $this->email->to('lamanoj11@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

       // echo $this->email->print_debugger();
    }
    public function delete()
    {
        if($this->session->userdata("is_login"))
        {
            //Load Model
            $this->load->model("UserAccount/User");
            $usr = new User();
            $user_id = $this->input->post("user_id");
            $usr->setUid($user_id);
            $usr->Delete();
            redirect("/users");
        }
        else
        {
            redirect("/login");
        }
    }
}
?>