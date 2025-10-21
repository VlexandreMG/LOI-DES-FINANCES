<?php 
require('Connexion.php');

function get_prevision_macroeco() {
    $base = connexion();

    $query = "SELECT PMA24.indicateur AS Indicateur, 
       PMA24.valeur AS Prevision_2024, 
       PMA25.valeur AS Prevision_2025, 
       PMA26.valeur AS Prevision_2026
FROM PMA24 
JOIN PMA25 ON PMA24.indicateur = PMA25.indicateur
JOIN PMA26 ON PMA24.indicateur = PMA26.indicateur;";

    $result = mysqli_query($base,$query);

    $previsions = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $previsions[] = $row;
    }

    return $previsions;
}

function get_secteur_primaire() {
    $base = connexion();

    $query = "SELECT SP24.nom AS Secteur, 
       SP24.taux_croissance AS Taux_Croissance_2024, 
       SP25.taux_croissance AS Taux_Croissance_2025
FROM SP24
JOIN SP25 ON SP24.nom = SP25.nom;";

    $result = mysqli_query($base,$query);

    $secteur_primaire = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $secteur_primaire[] = $row;
    }

    return $secteur_primaire;
}

function get_secteur_secondaire() {
    $base = connexion();

    $query = "SELECT SS24.nom AS Secteur, 
       SS24.taux_croissance AS Taux_Croissance_2024, 
       SS25.taux_croissance AS Taux_Croissance_2025
FROM SS24
JOIN SS25 ON SS24.nom = SS25.nom;";

    $result = mysqli_query($base,$query);

    $secteur_primaire = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $secteur_primaire[] = $row;
    }

    return $secteur_primaire;
}

function get_secteur_tertiaire() {
    $base = connexion();

    $query = "SELECT ST24.nom AS Secteur, 
       ST24.taux_croissance AS Taux_Croissance_2024, 
       ST25.taux_croissance AS Taux_Croissance_2025
FROM ST24
JOIN ST25 ON ST24.nom = ST25.nom;";

    $result = mysqli_query($base,$query);

    $secteur_primaire = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $secteur_primaire[] = $row;
    }

    return $secteur_primaire;
}
?>