<?php
require_once('../const.php');
require_once(ROOT . '/model/model.php');

class poll_details extends model {

    public $user_id, $f_name, $m_name, $l_name, $email, $gender, $dob, $table_name;

    function __construct(){
        $this->table_name = "poll_details";
        parent::$fields = array("poll_id", "admin_id", "poll_head", "poll_description", "start_date", "end_date");
        parent::__construct();
    }

    public function loadPoll($poll_id, $admin_id, $poll_head, $poll_description, $start_date, $end_date) {
        $this->poll_id = $poll_id;
        $this->admin_id = $admin_id0;
        $this->poll_head = $poll_head;
        $this->poll_description = $poll_description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function toArray() {
        $res_array = array();
        foreach(parent::$fields as $field) {
            $res_array[$field] = $this->{$field};
        }
        /*$user_array["user_id"] = $this->user_id;
        $user_array["f_name"] = $this->f_name;
        $user_array["m_name"] = $this->m_name;
        $user_array["l_name"] = $this->l_name;
        $user_array["email"] = $this->email;
        $user_array["gender"] = $this->gender;
        $user_array["dob"] = $this->dob;*/
    }

    public function savePollDetails() {
        if($this->isTableExists($this->table_name)) {
            if(empty($this->poll_id)) {
                $where_param = "(`poll_id` = '" . $this->poll_id . "')";
                $this->update($this->table_name, $set, $where_param);
            } else {
                $fields = array_keys($this->toArray());
                $this->insert($this->table_name, $fields, $this->toArray());
            }
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDetails() {
        if($this->isTableExists($this->table_name)) {
            $this->select($this->table_name);
            return $this->result;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDetailsByID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`poll_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $this->map($this->result);
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }

    public function getPollDetailsByAdminID($id) {
        if($this->isTableExists($this->table_name)) {
            $where_param = "(`admin_id` = '" . $id . "')";
            $this->select($this->table_name, '*', $where_param);
            $poll_details_obj = $this->result;
            return $poll_details_obj;
        } else {
            throw new Exception ('Table ' . $this->table_name . ' not found..!!');
        }
    }
}
