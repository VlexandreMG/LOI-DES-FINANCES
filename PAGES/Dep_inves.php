<?php 
include('../INC/Fonction.php');
 $stmt15 = dep_investissement_2024_interne();
    $stmt16 = dep_investissement_2025_interne();
    $stmt17 = dep_investissement_2024_externe();
    $stmt18 = dep_investissement_2025_externe();
    $stmt19 = get_total_inv_24();
    $stmt20 = get_total_inv_25();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dépenses d'investissement</h3>
        <table border=1>
            <tr>
                <th>Type</th>
                <th>LFR 2024</th>
                <th>LF 2025</th>
            </tr>
            <tr>
                <?php 
                foreach ($stmt15 as $row1) {
                    foreach ($stmt16 as $row2) {?>
                        <td><?php echo $row1['type_investissement'];?></td>
                        <td><?php echo $row1['montant'];?></td>
                        <td><?php echo $row2['montant'];?></td>
                  <?php   }
               }
               
               ?>
                </tr>
                <tr>
               <?php 
               foreach ($stmt17 as $row1) {
                foreach ($stmt18 as $row2) {?>
                    <td><?php echo $row1['type_investissement'];?></td>
                    <td><?php echo $row1['montant']; ?></td>
                    <td><?php echo $row2['montant'];?></td>
               <?php }
               }
               ?>
               </tr>
               <tr>
                <?php foreach ($stmt19 as $row1) {
                    foreach ($stmt20 as $row2) {?>
                        <td>Total</td>
                        <td><?php echo $row1['total'];?></td>
                        <td><?php echo $row2['total'];?></td>
                  <?php   }
                } ?>
               </tr>
           
           
               
            
        </table>
</body>
</html>