<?php 
include('../INC/Fonction.php');
 $stmt5 = get_postes_budgetaire();
$stmt6 = get_total_postes_autorisees();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dépenses de soldes et pensions</h3>
            <h4>Masse salariale</h4>
           
            
            
            
            <table border=1>
                <tr>POSTES BUDGETAIRES AUTORISEES POUR 2025</tr>
               
                    <?php 
                     
                    foreach ($stmt5 as $row) { ?>
                    <tr>
                        <td><?php echo $row['ministere'];?></td>
                        <td><?php echo $row['postes_autorises'];?></td>
                     </tr>
                   <?php  }
                    ?>
                    <tr>
                        <td>TOTAL</td>
                        <?php foreach ($stmt6 as $row) {?>
                            <td><?php echo $row['total'];?></td>
                       <?php }?>
                    </tr>
               
            </table>
         
    
</body>
</html>