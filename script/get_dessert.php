<?php
require_once('../config/config_db.php');

include '../config/header.php';

$select = $db->prepare('SELECT * FROM dessert');
$select->execute();
$dessert = $select->fetchAll();
echo json_encode($dessert);


?>