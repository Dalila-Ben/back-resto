<?php
require_once('../config/config_db.php');

include '../config/header.php';

$select = $db->prepare('SELECT * FROM recettesnb');
$select->execute();
$plats = $select->fetchAll();

$select = $db->prepare('SELECT * FROM nouvelles');
$select->execute();
$nouvelles = $select->fetchAll();

$data = array_merge($plats, $nouvelles);

echo json_encode($data);
?>