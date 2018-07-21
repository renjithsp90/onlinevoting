<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class positions extends model {

    public $position_id, $poll_id, $position_name;

    function __construct(){
        $this->table_name = "position";
        parent::$fields = array("position_id", "poll_id", "position_name");
        parent::__construct();
    }

    public function loadPosition($position_id, $poll_id, $position_name) {
        $this->poll_id = $poll_id;
        $this->position_id = $position_id;
        $this->position_name = $position_name;
    }

    public function toArray() {
        $res_array = array();
        foreach(parent::$fields as $field) {
            $res_array[$field] = $this->{$field};
        }
        return $res_array;
    }

    public function savePosition() {
        if($this->isTableExists($this->table_name)) {
            if(!empty($this->position_id)) {
                $where_param = "(`position_id` = '" . $this->poll_id . "')";
                //$this->update($this->table_name, $set, $where_param);
            } else {
                $res = $this->insert($this->table_name, parent::$fields, $this->toArray());
                return $res;
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPositionByID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`position_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPositionByPollID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPositions() {
        if($this->isTableExists($this->table_name)) {
            $this->select($this->table_name);
            $position_details_obj = $this->result;
            return $position_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
