<?php 

    include('../INC/Fonction.php');
    $stmt = get_depenses_par_rubriques();
    $stmt2 = get_total_depenses_par_rubriques();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Répartition des dépenses par nature économique</h2>
        <h5>Tableau 7:Ventilation des depenses par rubrique:</h5>
        
        <table border=1>
            <tr>
                <th>RUBRIQUES</th>
                <th>LFR2024</th>
                <th>LFR2025</th>
            </tr>
            <?php foreach ($stmt as $row) { ?>
                <tr>
                    <td><?php echo $row['nom'];?></td>
                    <td><?php echo $row['LFR2024'];?></td>
                    <td><?php echo $row['LFR2025'];?></td>
                </tr>
           <?php  }?>
           <?php foreach ($stmt2 as $row) {?>
                <tr>
                    <td>Total</td>
                    <td><?php echo $row['total2024'];?></td>
                    <td><?php echo $row['total2025'];?></td>
                </tr>
          <?php } ?>
       
    </table>
</body>
</html>