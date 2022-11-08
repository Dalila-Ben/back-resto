<?php
/* Connexion à la base de donnée */
require_once '../config/config.php';

/* Définir le format du header */
include_once '../config/header.php';

/* Fonction permettant de supprimer un serveur d'intégration
Retourne le résultat de la requete de suppression ~ true or false*/
function removeIs($bdd, $id_is) {
    $delete = $bdd->prepare('DELETE FROM integration_server WHERE id_is = :id_is');
    return $delete->execute(array(
        'id_is' => $id_is
    ));
}

removeIs($bdd, $_GET['id_is']);
