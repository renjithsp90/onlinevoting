<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class voter extends model {

    public $id, $poll_id, $user_id;

    function __construct(){
        $this->table_name = "voters";
        parent::$fields = array("id", "poll_id", "user_id");
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
            if(!empty($this->candidate_id)) {
                $where_param = "(`id` = '" . $this->id . "')";
                //$this->update($this->table_name, $set, $where_param);
            } else {
                $this->id = 'null';
                $res = $this->insert($this->table_name, parent::$fields, $this->toArray());
                return $res;
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getVoterByID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);  
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getVoterByUserID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`user_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            //$this->map($this->result);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getVotersByPollID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function deleteVoter($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function deleteVoterByUserID($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'user_id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
