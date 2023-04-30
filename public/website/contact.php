<?php
header("Content-Type: application/json; charset=utf-8");

$return = new \stdClass();
$return->error = true;
$return->message = 'Failed to send the message';

echo json_encode($return);