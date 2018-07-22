<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class candidate extends model {

    public $candidate_id, $poll_id, $position_id, $user_id;

    function __construct(){
        $this->table_name = "candidate";
        parent::$fields = array("candidate_id", "position_id", "poll_id", "user_id");
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
                $where_param = "(`candidate_id` = '" . $this->candidate_id . "')";
                //$this->update($this->table_name, $set, $where_param);
            } else {
                $this->candidate_id = 'null';
                $res = $this->insert($this->table_name, parent::$fields, $this->toArray());
                return $res;
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidateByID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`candidate_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);  
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidateByPollID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidateByPositionID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`position_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidateByPollIDAndPositionID($poll_id, $position_id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $poll_id . "' AND `position_id` = '" . $position_id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getCandidates() {
        if($this->isTableExists($this->table_name)) {
            $this->select($this->table_name);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function deleteCandidate($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'candidate_id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function deleteCandidateByUserID($id) {
        if($this->isTableExists($this->table_name)) {
            $this->delete($this->table_name, 'user_id', $id);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
