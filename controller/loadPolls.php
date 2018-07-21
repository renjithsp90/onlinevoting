<?php
require_once('../const.php');
require_once(ROOT . '/model/poll_details.php');
$poll_details = new poll_details();
$poll_list = $poll_details->getPollDetails();
echo json_encode( $poll_list );