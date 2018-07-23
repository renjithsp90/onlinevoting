<?php
require_once('../const.php');
require_once(ROOT . '/model/poll_details.php');
require_once(ROOT . '/model/poll_data.php');
require_once(ROOT . '/model/voter.php');

$poll_details = new poll_details();
if(isset($_GET['method'])) {
    $method = $_GET['method'];
    if($method == 'select') {
        if(isset($_GET['user_id'])) {
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
        } else if(isset($_GET['poll_id']) && isset($_GET['position_id']) && isset($_GET['voter_id'])){
            $poll_id = $_GET['poll_id'];
            $position_id = $_GET['position_id'];
            $voter_id = $_GET['voter_id'];
            $poll_data = new poll_data();
            $vote = $poll_data->getPollDataByPollIDAndPositionIDAndVoterID($poll_id, $position_id, $voter_id);
            echo json_encode($vote);
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