<?php
require_once('../const.php');
require_once(ROOT . '/model/user.php');
require_once(ROOT . '/model/candidate.php');
require_once(ROOT . '/model/voter.php');
require_once(ROOT . '/model/user_login.php');

if(isset($_GET['method'])){
    $method = $_GET['method'];
    $type = $_GET['type'];
    if($method == 'add') {
        $user = new user();
        $arr = (array)(($_GET));
        $user->map($arr);
        $res = $user->saveUser();
        if($res && $_GET['user_id'] == '') {
            $user_login_array = array(
                "login_id" => '',
                "user_id" => $res,
                "username" => $_GET['email'],
                "password" => "password",
                "user_role_id" => $type
            );
            $user_login = new user_login();
            $user_login->map($user_login_array);
            $login_save_res = $user_login->save();
            if($login_save_res) {
                if($type == 'candidate') {
                    $candidate_array = array(
                        "candidate_id" => '',
                        "poll_id" => $_GET['dd-polls'],
                        "position_id" => $_GET['dd-positions'],
                        "user_id" => $res);
                    $candidate = new candidate();
                    $candidate->map($candidate_array);
                    $candidate_save_res = $candidate->save(); 
                    if($candidate_save_res) {
                        echo "success";
                    }
                } else if($type == 'voter'){
                    $voter_array = array(
                        "id" => '',
                        "poll_id" => $_GET['dd-polls'],
                        "user_id" => $res
                    );
                    $voter = new voter();
                    $voter->map($voter_array);
                    $voter_save_res = $voter->save();
                    if($voter_save_res) {
                        echo "success";
                    }
                } else {
                    echo "success";
                }
            }
        }   
    }
    if($method == 'select') {
        if($type == 'candidate') {
            if(isset($_GET['dd-polls']) && isset($_GET['dd-positions'])) {
                $poll_id = $_GET['dd-polls'];
                $position_id = $_GET['dd-positions'];
                $candidate = new candidate();
                $candidate_list = $candidate->getCandidateByPollIDAndPositionID($poll_id, $position_id);
                $user_list = array();
                foreach($candidate_list as $c) {
                    $user = new user();
                    $user->getUserByID($c['user_id']);
                    array_push($user_list, $user->toArray());
                }
                $json_str = json_encode($user_list);
                echo $json_str;
            }
        }
        if($type == 'user') {
            if(isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $user = new user();
                $user->getUserByID($user_id);
                $json_str = json_encode($user->toArray());
                echo $json_str;
            }
        }
    }
    if($method == 'delete') {
        $user_id = $_GET['user_id'];
        if($type == 'candidate') {
            $candidate = new candidate();
            $candidate->deleteCandidateByUserID($user_id);
        }
        if($type == 'voter') {
            $voter = new voter();
            $voter->deleteVoterByUserID($user_id);
        }
        $user_login = new user_login();
        $user_login->deleteUserLoginByUserID($user_id);
        $user = new user();
        $user->deleteUser($user_id);
        echo 'success';
    }
}