<?php
if (empty($_GET['json'])) {
    header('Location: /?window=' . urlencode($_SERVER['REQUEST_URI']));
    die();
}
header("Content-Type: application/json; charset=utf-8");
$DUMBDOG->page->destory = 'true';
echo json_encode($DUMBDOG->page);