<?php 

include('../INC/Fonction.php');
 $stmt1 = get_deficit_budgetaire();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h2>Prevision du deficit budgetaire</h2>
    <table border=1>
        <tr>
            <th>Recettes totales et dons</th>
            <th>Déficit </th>
            <th>Dépenses totales</th>
        </tr>
        <tr>
            <?php foreach ($stmt1 as $row) {?>
                <td><?php echo $row['recettes_total_dons'];?></td>
                <td><?php echo $row['deficit'];?></td>
                <td><?php echo $row['depenses_total'];?></td>
           <?php  }?>

        </tr>
    </table>
</body>
</html>