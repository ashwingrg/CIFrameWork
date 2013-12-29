<?php

class User extends CI_Model
{
    private $uid;
    private $username;
    private $password;
    private $name;
    private $user_type;
    private $user_role;
    private $user_status;
    private $user_timestamp;
    private $profile_picture;
    public function setPic($v)
    {
        $this->profile_picture = $v;
    }
    public function getPic()
    {
        return $this->profile_picture;
    }
    public function setUid($v)
    {
        $this->uid = $v;
    }
    public function getUid()
    {
        return $this->uid;
    }
    public function setUsername($v)
    {
        $this->username = $v;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setPsw($v)
    {
        $this->password=$v;
    }
    public function getPsw()
    {
        return $this->password;
    }
    public function setName($v)
    {
        $this->name = $v;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setUserType($v)
    {
        $this->user_type=$v;
    }
    public function getUserType()
    {
        return $this->user_type;
    }
    public function setUserRole($v)
    {
        $this->user_role=$v;
    }
    public function getUserRole()
    {
        return $this->user_role;
    }
    public function setUserStatus($v)
    {
        $this->user_status=$v;
    }
    public function getUserStatus()
    {
        return $this->user_status;
    }
    public function setTimeStamp($v)
    {
        $this->user_timestamp=$v;
    }
    public function getTimeStamp()
    {
        return $this->user_timestamp;
    }

    public function Insert()
    {
        //$this->db->query("INSERT INTO User (username,password) VALUES('$this->username',)");
        //$this->db->query ("Select from USER where username=? and password=?", array($username,$password));
        $this->db->query("INSERT INTO user (uid,username,password, name, user_type, user_role,user_status,user_timestamp) VALUES(?,?,?,?,?,?,?,?)",array($this->uid,$this->username, $this->password,$this->name,$this->user_type,$this->user_role,$this->user_status,$this->user_timestamp));
    }
    public function UpdatePic()
    {
        $this->db->query("UPDATE user SET profile_picture = ? WHERE uid = ?",array($this->profile_picture, $this->uid));
    }
    public function Update()
    {
        $this->db->query("UPDATE user SET name = ? WHERE uid = ?",array($this->name, $this->uid));
    }
    public function Delete()
    {
        $this->db->query("DELETE FROM user WHERE uid = ?",array($this->uid));
    }
    public function FillData($result)
    {
       // print_r($result);
        $returnData = array();
        foreach($result as $res)
        {
            $usr = new User();
            $usr->setUid($res->uid);
            $usr->setName($res->name);
            $usr->setUsername($res->username);
            $usr->setPic($res->profile_picture);
            $usr->setUserType($res->user_type);
            $returnData[] = $usr;
        }
        return $returnData;
    }
    public function Login()
    {
       // echo $this->password; exit;
        $query = $this->db->query("SELECT * FROM user WHERE username = ? AND password = ?",array($this->username,$this->password));
        $result = $query->result();
        return $this->FillData($result);
    }
    public function SelectClass()
{
    $result = $this->db->query("SELECT * FROM classes")->result();
    return $result[0]->module_name;
}
    public function SelectId($id)
    {
        $result = $this->db->query("SELECT * FROM user WHERE uid = ?",array($id))->result();
        return $this->FillData($result);
    }
    public function Select()
    {
        $result = $this->db->query("SELECT * FROM user")->result();
        return $this->FillData($result);
    }
}