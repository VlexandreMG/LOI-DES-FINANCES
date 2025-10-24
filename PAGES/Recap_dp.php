<?php 
include('../INC/Fonction.php');
$stmt13 = total_2024();
 $stmt24 = get_dep_fonctionnement();
 $stmt14 = total_2025();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Tableau 9:Récapitulation des dépenses de fonctionnement</h4>
        <table border=1>
            <tr><td>
                (En milliards d'Ariary)
            </td>
            <th>2024</th>
            <th>2025</th>
            <th>Ecart</th>
           
        </tr>
       
            <?php foreach ($stmt24 as $key => $row) {?>
               <tr>
                <td><?php echo $row['type_depense'];?></td>
                <td><?php echo $row['DS24'];?></td>
                <td><?php echo $row['DS25'];?></td>
                <td><?php echo $row['ecart']?></td>
               </tr> 
           <?php }?>
            <td>Total</td>
            <?php 
            foreach ($stmt13 as $row1) {
                foreach ($stmt14 as $row2) {?>
                    <td><?php echo $row1['total'];?></td>
                    <td><?php echo $row2['total'];?></td>
                    <?php $ecart = $row2['total']-$row1['total'];?>
                    <td><?php echo $ecart;?></td>
               <?php }
            }
            
            ?>

        </tr>
        </table>
    
</body>
</html>