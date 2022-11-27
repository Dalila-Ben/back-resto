<?php
require_once('../config/config_db.php');

include '../config/header.php';
$datas = json_decode(file_get_contents('php://input'));
//le prepare() permet prevenir les injection sql
$user_info = array('nom' => null, 'password' => null, 'email' => null);

foreach ($datas as $index => $data):
    $user_info[$index] = $data;
endforeach;
if(!empty($user_info['nom']) && !empty($user_info['password']) && !empty($user_info['email'])) // isset($postdata) && !empty($postdata)
{
$request = 'INSERT INTO user(nom, password, email) VALUES(:nom, :password, :email) ';
$insert = $db->prepare($request);
$insert->execute($user_info);
echo json_encode('ok');
}
