<?php
require_once('../const.php');
require_once(ROOT . '/model/poll_details.php');
require_once(ROOT . '/model/poll_data.php');
require_once(ROOT . '/model/voter.php');
require_once(ROOT . '/model/user.php');
require_once(ROOT . '/model/positions.php');
require_once(ROOT . '/model/candidate.php');

$poll_details = new poll_details();
if(isset($_GET['method'])) {
    $method = $_GET['method'];
    if($method == 'select') {
        if(isset($_GET['user_id']) && isset($_GET['type'])) {
            $user_id = $_GET['user_id'];
            $type = $_GET['type'];
            if($type == 'voter') {
                $voter = new voter();
                $voter_list = $voter->getVoterByUserID($user_id);
                if(array_key_exists('user_id', $voter_list)){
                    $voter_list = [$voter_list];
                }
                $polls_list = array();
                foreach($voter_list as $vtr) {
                    $poll = new poll_details();
                    $poll->getPollDetailsByID($vtr['poll_id']);
                    array_push($polls_list, $poll->toArray());
                }
                $json_str = json_encode($polls_list);
                echo $json_str;
            }
        } else if(isset($_GET['poll_id']) && isset($_GET['position_id']) && isset($_GET['user_id'])){
            $poll_id = $_GET['poll_id'];
            $position_id = $_GET['position_id'];
            $user_id = $_GET['user_id'];
            $poll_data = new poll_data();
            $vote = $poll_data->getPollDataByPollIDAndPositionIDAndUserID($poll_id, $position_id, $user_id);
            echo json_encode($vote);
        } else if(isset($_GET['admin_id'])  && isset($_GET['type'])) {
            $admin_id = $_GET['admin_id'];
            $poll = new poll_details();
            $poll_details_list = $poll->getPollDetailsByAdminID($admin_id);
            echo json_encode($poll_details_list);
        } else if(isset($_GET['type']) && isset($_GET['poll_id']) && isset($_GET['position_id'])) {
            $type = $_GET['type'];
            $poll_id = $_GET['poll_id'];
            $position_id = $_GET['position_id'];
            $res_obj = array();
            if($type == 'result') {
                $candidate = new candidate();
                $candidate_list = $candidate->getCandidateByPollIDAndPositionID($poll_id, $position_id);
                foreach ($candidate_list as $c) {
                    $user = new user();
                    $user->getUserByID($c['user_id']);
                    $poll_data = new poll_data();
                    $poll_data_list = $poll_data->getPollDataByPollIDAndPositionIDAndCandidateID($poll_id, $position_id, $c['candidate_id']);
                    $count = sizeof($poll_data_list);
                    $obj = array(
                        "Candidate" => $user->f_name . " " . $user->m_name . " " . $user->l_name,
                        "Poll Count" => $count
                    );
                    array_push($res_obj, $obj);
                }
                echo json_encode($res_obj);
            }
        } else {
            $poll_list = $poll_details->getPollDetails();
            echo json_encode( $poll_list );
        }
    }
    if($method == 'add') {
        $type = $_GET['type'];
        if($type == 'poll') {
            $arr = (array)($_GET);
            $poll_data = new poll_data();
            $poll_data->map($arr);
            echo $poll_data->save();
        }
    }
}