<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class user extends model {

    public $user_id, $f_name, $m_name, $l_name, $email, $gender, $dob, $table_name;

    function __construct(){
        $this->table_name = "users";
        parent::$fields = array("user_id", "f_name", "m_name", "l_name", "email", "gender", "dob");
        parent::__construct();
    }

    public function loadUser($user_id, $f_name, $m_name, $l_name, $email, $gender, $dob) {
        $this->user_id = $user_id;
        $this->f_name = $f_name;
        $this->m_name = $m_name;
        $this->l_name = $l_name;
        $this->email = $email;
        $this->gender = $gender;
        $this->dob = $dob;
    }

    public function toArray() {
        $res_array = array();
        foreach(parent::$fields as $field) {
            $res_array[$field] = $this->{$field};
        }
        return $res_array;
        /*$user_array["user_id"] = $this->user_id;
        $user_array["f_name"] = $this->f_name;
        $user_array["m_name"] = $this->m_name;
        $user_array["l_name"] = $this->l_name;
        $user_array["email"] = $this->email;
        $user_array["gender"] = $this->gender;
        $user_array["dob"] = $this->dob;*/
    }

    public function saveUser() {
        if($this->isTableExists($this->table_name)) {
            if(!empty($this->user_id)) {
                $where_param = "(`user_id` = '" . $this->user_id . "')";
                //$this->update($this->table_name, $set, $where_param);
            } else {
                $this->user_id = 'null';
                return $this->insert($this->table_name, parent::$fields, $this->toArray());
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getUserByID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`user_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}

$u = new user();
$u->getUserByID(9);
