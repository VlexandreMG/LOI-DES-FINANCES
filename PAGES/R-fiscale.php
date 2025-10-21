<?php 
include('../INC/Fonction.php');
$rfi = get_rfi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes fiscales</title>
</head>
<body>
    <table>
        <tr>
        <th>Nature d'impôts</th>
        <th>LFR 2024</th>
        <th>LFR 2025</th>
        </tr>

        <?php foreach ($rfi as $value) { ?>
        <tr>
            <td><?php echo $value['nature_impots'] ?></td>
            <td><?php echo $value['LFR2024'] ?></td>
            <td><?php echo $value['LFR2025']?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>