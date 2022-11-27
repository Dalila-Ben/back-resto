<?php
require_once('../config/config_db.php');

include '../config/header.php';
$datas = json_decode(file_get_contents("php://input"));
$user_info = array('password' => null, 'email' => null);

foreach ($datas as $index => $data):
    $user_info[$index] = $data;
endforeach;
//tests
// $user_info['password']= '123456';
// $user_info['email']= 'coucou@gmail.com';

if(!empty($user_info['password']) && !empty($user_info['email']))
{ 
$request = 'SELECT email, password, token FROM user WHERE email=:email AND password=:password';
$select = $db->prepare($request);
$select->execute($user_info);
$select= $select->fetchAll();
foreach($select as $selects):
$token = $selects['token'];
endforeach;
$select= count($select); //donne le champs presents dans la table


if($select == 1){
    echo json_encode($token);
}else {
    echo json_encode("le compte n'existe pas");
}
}
