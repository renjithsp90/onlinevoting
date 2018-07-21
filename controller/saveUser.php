<?php
require_once('../const.php');
require_once(ROOT . '/model/user.php');
require_once(ROOT . '/model/candidate.php');
require_once(ROOT . '/model/voter.php');
require_once(ROOT . '/model/user_login.php');

if(isset($_GET['dd-polls'])){
    $type = $_GET['type'];
    $user = new user();
    $arr = (array)(($_GET));
    $user->map($arr);
    $res = $user->saveUser();
    if($res) {
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