<?php 
ini_set("display_errors","1");
include('../INC/Fonction.php');

$previsions = get_prevision_macroeco();
$secteur_primaire = get_secteur_primaire();
$secteur_secondaire = get_secteur_secondaire();
$secteur_tertiaire = get_secteur_tertiaire();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerspectiveEconomique</title>
</head>
<body>
    <p>En 2025 , l'economie malgache devrait connaître une croissance de 5,0% , soutenue par des per-
formances solides dans plusieurs
secteurs stratégiques : </p>

    <h2>1 - L'agriculture :</h2>
    <p>L'agricultue a augmenté d'une valeur de 9,5% en 2025 , 
    Maintenant un champ peut produire 8 tonnes de riz , 
permettant de donner plus à manger pour le peuple et en vendre plus aux autres pays. </p>

    <h2>2 - L'industrie extractive :</h2>
    <p>Les mines vont repartir à 4% en 2025 , 
        utilisé pour la production de batterie pour les voitures electriques et
        à l'exploitation d'énergie renouvelable. 
    </p>

    <h2>3 - Le secteur tertiaire :</h2>
    <p>Les services vont croître de 5,4% en 2025 , 
        visant à améliorer le secteur touristique et à developper les infrastructures numériques.
    </p>
    <h2>Les grands agrégats macroéconomiques sont présentés dans le tableau
ci-après :</h2>
    <h2>Tableau 1 : Prévisions Macroéconomiques</h2>
    <table border="1">
        <tr>
        <th>AGREGATS MACROECONOMIQUES</th>
        <th>2024</th>
        <th>2025</th>
        <th>2026</th>
        </tr>

        <?php foreach ($previsions as $value) { ?>
            <tr>
                <td><?php echo $value['Indicateur']; ?></td>
                <td><?php echo $value['Prevision_2024']; ?></td>
                <td><?php echo $value['Prevision_2025']; ?></td>
                <td><?php echo $value['Prevision_2026']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Tableau 2 : Taux de croissance sectorielle</h2>
    <h3>Secteur Primaire</h3>
    <table border="1">
        <tr>
            <th>Variation en [%]</th>
            <th>2024</th>
            <th>2025</th>
        </tr>
        <?php foreach ($secteur_primaire as $value) { ?>
            <tr>
                <td><?php echo $value['Secteur']; ?></td>
                <td><?php echo $value['Taux_Croissance_2024']; ?></td>
                <td><?php echo $value['Taux_Croissance_2025']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h3>Secteur Secondaire</h3>
    <table border="1">
        <tr>
            <th>Variation en [%]</th>
            <th>2024</th>
            <th>2025</th>
        </tr>
        <?php foreach ($secteur_secondaire as $value) { ?>
            <tr>
                <td><?php echo $value['Secteur']; ?></td>
                <td><?php echo $value['Taux_Croissance_2024']; ?></td>
                <td><?php echo $value['Taux_Croissance_2025']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h3>Secteur Tertiaire</h3>
    <table border="1">
        <tr>
            <th>Variation en [%]</th>
            <th>2024</th>
            <th>2025</th>
        </tr>
        <?php foreach ($secteur_tertiaire as $value) { ?>
            <tr>
                <td><?php echo $value['Secteur']; ?></td>
                <td><?php echo $value['Taux_Croissance_2024']; ?></td>
                <td><?php echo $value['Taux_Croissance_2025']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <p><a href="CoeurDuBudget.php">Retour</a></p>
</body>
</html>