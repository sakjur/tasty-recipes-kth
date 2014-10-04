<?php

require_once(DIRNAME(__FILE__) . "/models/database.php");

$db = new Database();

$data = $db->valid_session('sakjur', '$2a$06$at17bG7IyIm1OZsMOJhWXODzMwpFfjakk76U5vbTGamgit6CnMWem');
echo $data;
$data = $db->valid_session('sakjur', '$2');
echo $data;

?>
