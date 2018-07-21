<?php
require_once('../const.php');
require_once(ROOT . '/model/positions.php');

if(isset($_GET['poll_id']) && isset($_GET['position_name'])){
    $poll_id = $_GET['poll_id'];
    $position_name = $_GET['position_name'];

    $p = new positions();
    $p->loadPosition('', $poll_id, $position_name);

    echo $p->savePosition();
}