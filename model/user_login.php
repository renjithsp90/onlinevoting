<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class user_login extends model {

    public $candidate_id, $poll_id, $position_id, $user_id;

    function __construct(){
        $this->table_name = "user_login";
        parent::$fields = array("login_id", "user_id", "username", "password", "user_role_id");
        parent::__construct();
    }

    public function toArray() {
        $res_array = array();
        foreach(parent::$fields as $field) {
            $res_array[$field] = $this->{$field};
        }
        return $res_array;
    }

    public function save() {
        if($this->isTableExists($this->table_name)) {
            if(!empty($this->login_id)) {
                $where_param = "(`login_id` = '" . $this->login_id . "')";
                //$this->update($this->table_name, $set, $where_param);
            } else {
                $this->login_id = 'null';
                $res = $this->insert($this->table_name, parent::$fields, $this->toArray());
                return $res;
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getUserLoginID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`login_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);  
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidateByUserID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`user_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidateByUsernamw($username) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`username` = '" . $username . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function deleteUserLogin($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'login_id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function deleteUserLoginByUserID($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'user_id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
