<?php 
    include('../INC/Fonction.php');
    $stmt21 = get_admin();
    $stmt22 = get_total_admin_2024();
    $stmt23 = get_total_admin_2025();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>Tableau 10 :Répartition du budget par rattachement administratif</h5>                        
                <table border=1>
                    <tr>
                        <th>Institution/Ministères</th>
                        <th>LFR 2024</th>
                        <th>LF 2025</th>
                    </tr>
                    
                    <?php 
                    foreach ($stmt21 as $row) {?>
                    <tr>
                        <td><?php echo $row['nom'];?></td>
                        <td><?php echo $row['LFR2024'];?></td>
                        <td><?php echo $row['LF2025'];?></td>
                         </tr>
                 <?php    }
                    ?>
                    <tr>
                        <td>Total Institutions et Ministères</td>
                        <?php
                        foreach ($stmt22 as $row1) {
                            foreach ($stmt23 as $row2) {?>
                                <td><?php echo $row1['total'];?></td>
                                <td><?php echo $row2['total'];?></td>
                          <?php  }
                        }
                        ?>
                    </tr>
                   
                </table>

</body>
</html>