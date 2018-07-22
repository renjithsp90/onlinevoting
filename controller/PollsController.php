<?php
require_once('../const.php');
require_once(ROOT . '/model/poll_details.php');
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
        } else {
            $poll_list = $poll_details->getPollDetails();
            echo json_encode( $poll_list );
        }
    }
}