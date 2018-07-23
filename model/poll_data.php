<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class poll_data extends model {

    public $poll_data_id, $poll_id, $position_id, $candidate_id, $user_id;

    function __construct(){
        $this->table_name = "poll_data";
        parent::$fields = array("poll_data_id", "poll_id", "position_id", "candidate_id", "user_id");
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
            if(!empty($this->poll_data_id)) {
                $where_param = "(`poll_data_id` = '" . $this->poll_data_id . "')";
            } else {
                $this->poll_data_id = '';
                $res = $this->insert($this->table_name, parent::$fields, $this->toArray());
                return $res;
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDataByID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_data_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);  
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDataByPollID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDataByPositionID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`position_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDataByPollIDAndPositionID($poll_id, $position_id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $poll_id . "' AND `position_id` = '" . $position_id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDataByPollIDAndPositionIDAndUserID($poll_id, $position_id, $user_id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $poll_id . "' AND `position_id` = '" . $position_id . "' AND `user_id` = '" . $user_id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDataByPollIDAndPositionIDAndCandidateID($poll_id, $position_id, $candidate_id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $poll_id . "' AND `position_id` = '" . $position_id . "' AND `candidate_id` = '" . $candidate_id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
