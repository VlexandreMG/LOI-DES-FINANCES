<?php 
require('Connexion.php');

    function get_theme(){
        $bdd = connexion();
        $query = "SELECT * from themes ";
        $result = mysqli_query($bdd, $query);
            $return = [];
            while($row = mysqli_fetch_assoc($result)){
                $return[] =$row;
            }
            return $return;

    }
    function get_type_by_no($theme_no){
        $bdd = connexion();
        $query = "SELECT * FROM types WHERE theme_id = '$theme_no' ";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        return $return;
    }
    function get_deficit_budgetaire(){
        $bdd = connexion();
        $query = "SELECT * FROM deficit_budgetaire";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        return $return;

    }
    function get_financement_deficit(){
        $bdd = connexion();
        $query = "SELECT * FROM financement_deficit";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        return $return;   
    }
    function get_totale_deficit(){
        $bdd = connexion();
        $query = "SELECT SUM(montant) as total FROM financement_deficit";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        return $return;  
    }
    
 function get_glossaire(){
        $bdd = connexion();

        $query = "SELECT * FROM glossaire ";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while($row = mysqli_fetch_assoc($result)){
            $return[] =$row;
        }
        return $return;
}
 function get_acronymes(){
        $bdd = connexion();
        $query = "SELECT * FROM acronymes";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while($row = mysqli_fetch_assoc($result)){
            $return[] =$row;
        }
        return $return;
}
function get_depenses_par_rubriques(){
        $bdd = connexion();
        $query = "SELECT * FROM depenses_rubrique ";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] =$row;
        }
        return $return;
}
function get_total_depenses_par_rubriques(){
        $bdd = connexion();
        $query = "SELECT SUM(dep.LFR2024) AS total2024,
        SUM(dep.LFR2025) AS total2025 FROM depenses_rubrique AS dep";
        $result = mysqli_query($bdd, $query);
        $return = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        return $return;
}
function get_ds_24(){
    $bdd = connexion();
    $query = "SELECT * FROM DSD24";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
    }
    return $return;

}
function get_ds_25(){
    $bdd = connexion();
    $query = "SELECT  * FROM DSD25";
    $result = mysqli_query($bdd, $query);
    $return = [];
   while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
    }
    return $return;
}
function get_postes_budgetaire(){
     $bdd = connexion();
    $query = "SELECT  * FROM postes_budgetaires ";
    $result = mysqli_query($bdd, $query);
    $return = [];
   while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
    }
    return $return;   
}
function get_total_postes_autorisees(){
     $bdd = connexion();
    $query = "SELECT  SUM(postes_autorises) AS total FROM postes_budgetaires ";
    $result = mysqli_query($bdd, $query);
    $return = [];
   while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
    }
    return $return; 
}
function get_dep_fonctionnement(){
     $bdd = connexion();
    $query = "SELECT * FROM dep_fonctionnement";
    $result = mysqli_query($bdd, $query);
    $return = [];
   while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
    }
    return $return; 
}
function indemnites_24(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_fonctionnement_2024 WHERE type_depense='Indemnit?s'";
    $result = mysqli_query($bdd , $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;
}
function indemnites_25(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_fonctionnement_2025 WHERE type_depense='Indemnités'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;
}
function bien_24(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_fonctionnement_2024 WHERE type_depense='Biens et Services'";
    $result = mysqli_query($bdd , $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;
}
function bien_25(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_fonctionnement_2025 WHERE type_depense='Biens et Services'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row; 

    }
    return $return;
}
function transfert_24(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_fonctionnement_2024 WHERE type_depense='Transferts et subventions'";
    $result = mysqli_query($bdd , $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;
}
function transfert_25(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_fonctionnement_2025 WHERE type_depense='Transferts et subventions'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;
}
function total_2024(){
    $bdd = connexion();
    $query = "SELECT SUM(montant) as total FROM  depenses_fonctionnement_2024";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;   
}
function total_2025(){
    $bdd = connexion();
    $query = "SELECT SUM(montant) as total FROM  depenses_fonctionnement_2025";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function dep_investissement_2024_interne(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_ivestissement_2024 WHERE type_investissement='PIP interne'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function dep_investissement_2025_interne(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_ivestissement_2025 WHERE type_investissement='PIP interne'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function dep_investissement_2024_externe(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_ivestissement_2024 WHERE type_investissement='PIP externe'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function dep_investissement_2025_externe(){
    $bdd = connexion();
    $query = "SELECT * FROM depenses_ivestissement_2025 WHERE type_investissement='PIP externe'";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function get_total_inv_24(){
     $bdd = connexion();
    $query = "SELECT SUM(montant) as total FROM depenses_ivestissement_2024";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function get_total_inv_25(){
     $bdd = connexion();
    $query = "SELECT SUM(montant) as total FROM depenses_ivestissement_2025";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function get_admin(){
      $bdd = connexion();
    $query = "SELECT * FROM rattache";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return;  
}
function get_total_admin_2024(){
     $bdd = connexion();
    $query = "SELECT SUM(montant) as total FROM budget_admin_2024 ";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return; 
}
function get_total_admin_2025(){
     $bdd = connexion();
    $query = "SELECT SUM(montant) as total FROM budget_admin_2025 ";
    $result = mysqli_query($bdd, $query);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    return $return; 
}

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