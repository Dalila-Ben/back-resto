<?php
require_once('../config/config_db.php');

include '../config/header.php';

$select = $db->prepare('SELECT * FROM plats');
$select->execute();
$plats = $select->fetchAll();
echo json_encode($plats);
?>