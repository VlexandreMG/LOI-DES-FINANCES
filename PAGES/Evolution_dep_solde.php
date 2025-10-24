<?php 
include('../INC/Fonction.php');
    $stmt3 = get_ds_24();
    $stmt4 = get_ds_25();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h5>Tableau 8:Evolution des dépenses de soldes</h5>
            <table border=1>
                <tr>
                    <th>Libelles</th>
                    <th>LFR 2024</th>
                    <th>LF 2025</th>
                    <th>Ecart</th>
                </tr>
                <tr>
                    <td>Dépenses de solde </td>
                    <?php 
                    foreach ($stmt3  as $row1) {?>
                      <?php foreach ($stmt4 as $row2) {?>
                        <td><?php echo $row1['masse_salariale'];?></td>
                        <td><?php echo $row2['masse_salariale'];?></td>
                        <?php 
                        $ecart = $row2['masse_salariale']-$row1['masse_salariale'];
                        ?>
                        <td><?php echo $ecart;?></td>
                         <?php   }?>
                   <?php  }
                    ?>
                    
                </tr>
                <tr>
                    <td>Indicateurs</td>
                </tr>
                <tr>
                    <td>Solde/PIB Nominal</td>
                    <?php 
                    foreach ($stmt3 as $row1) {
                        foreach ($stmt4 as $row2) {?>
                            <td><?php echo $row1['solde_pib'];?></td>
                            <td><?php echo $row2['solde_pib'];?></td>
                            <?php $ecart = $row2['solde_pib'] - $row1['solde_pib'];?>
                            <td><?php echo $ecart;?></td>
                    <?php }
                    }
                    ?>

                </tr>
                <tr>
                    <td>Solde/Recettes fiscales nettes</td>
                    <?php 
                    foreach ($stmt3 as $row1) {
                        foreach ($stmt4 as $row2) {?>
                             <td><?php echo $row1['solde_recettes_fiscales'];?></td>
                            <td><?php echo $row2['solde_recettes_fiscales'];?></td>
                            <?php $ecart = $row2['solde_recettes_fiscales'] - $row1['solde_recettes_fiscales'];?>
                            <td><?php echo $ecart;?></td>
                     <?php    }
                    }
                    ?>
                </tr>
                <tr>
                    <td>Solde/Dépenses totales</td>
                    <?php 
                    foreach ($stmt3 as $row1) {
                        foreach ($stmt4 as $row2) {?>
                             <td><?php echo $row1['solde_depenses_total'];?></td>
                            <td><?php echo $row2['solde_depenses_total'];?></td>
                            <?php $ecart = $row2['solde_depenses_total'] - $row1['solde_depenses_total'];?>
                            <td><?php echo $ecart;?></td>
                     <?php    }
                    }
                    ?>

                </tr>


                
            </table>

    
</body>
</html>