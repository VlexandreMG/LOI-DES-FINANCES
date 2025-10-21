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
    <h1>Tableau 1 : Prévisions Macroéconomiques</h1>
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

    <h1>Tableau 2 : Taux de croissance sectorielle</h1>
    <h2>Secteur Primaire</h2>
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

    <h2>Secteur Secondaire</h2>
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

    <h2>Secteur Tertiaire</h2>
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
</body>
</html>