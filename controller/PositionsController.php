<?php
require_once('../const.php');
require_once(ROOT . '/model/positions.php');

if(isset($_GET['poll_id']) && isset($_GET['method'])){

    $method = $_GET['method'];
    $poll_id = $_GET['poll_id'];
    $p = new positions();

    if($method == 'add') {
        $position_name = $_GET['position_name'];
        $p->loadPosition('', $poll_id, $position_name);

        echo $p->savePosition();
    } else if ($method == 'delete') {

    } else if ($method == 'select') {
        $pos_list = $p->getPositionByPollID($poll_id);
        $json_str = json_encode($pos_list);
        echo $json_str;
    }
}