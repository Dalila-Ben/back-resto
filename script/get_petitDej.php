<?php
require_once('../config/config_db.php');

include '../config/header.php';

$select = $db->prepare('SELECT * FROM petitdej');
$select->execute();
$petitdej = $select->fetchAll();
echo json_encode($petitdej);
?>