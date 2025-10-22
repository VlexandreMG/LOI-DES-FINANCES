<?php
ini_set("display_errors", "1"); 
include('../INC/Fonction.php');
$rd = get_dons();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes doaniere</title>
</head>
<body>
    <table>
        <tr>
        <th>Dons</th>
        <th>LFR 2024</th>
        <th>LFR 2025</th>
        </tr>

        <?php foreach ($rd as $value) { ?>
        <tr>
            <td><?php echo $value['type_don'] ?></td>
            <td><?php echo $value['LFR2024'] ?></td>
            <td><?php echo $value['LFR2025']?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>