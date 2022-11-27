<?php
require_once('../config/config_db.php');

include '../config/header.php';

$datas = json_decode(file_get_contents('php://input'));
// le prepare() permet prevenir les injection sql
$nvRecettes = array('nom' => null, 'recette' => null);
//tests
// $nvRecettes['nom']= 'pastilla ';
// $nvRecettes['recette']= 'pastilla poulet';

foreach ($datas as $index => $data):
    $nvRecettes[$index] = $data;
endforeach;
if(!empty($nvRecettes['nom']) && !empty($nvRecettes['recette'])) // isset($postdata) && !empty($postdata)
{
$request = 'INSERT INTO nouvelles(nom, recette) VALUES(:nom, :recette) ';
$insert = $db->prepare($request);
$verif = $insert->execute(array(
    'nom'=> $nvRecettes['nom'],
    'recette'=> $nvRecettes['recette']
));
echo json_encode($verif);
}
