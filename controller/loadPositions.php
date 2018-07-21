<?php
require_once('../const.php');
require_once(ROOT . '/model/positions.php');
$positions = new positions();
if(isset($_GET['poll_id'])) {
    $poll_id = $_GET['poll_id'];
    $position_list = $positions->getPositionByPollID($poll_id);
    echo json_encode( $position_list );
} else {
    $position_list = $positions->getPositions();
    echo json_encode( $position_list );
}