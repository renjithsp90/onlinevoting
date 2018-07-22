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
    }

    public function saveUser() {
        if($this->isTableExists($this->table_name)) {
            if(!empty($this->user_id)) {
                $where_param = " `user_id` = '" . $this->user_id . "'";
                $set_param = "";
                foreach(parent::$fields as $field) {
                    $set_param .= "`" . $field . "`='" . $this->{$field} . "',"; 
                }
                $set_param = substr($set_param, 0, -1);
                return $this->update($this->table_name, $set_param, $where_param);
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

    public function deleteUser($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'user_id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
