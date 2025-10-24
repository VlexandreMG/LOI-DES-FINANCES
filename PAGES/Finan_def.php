<?php 
    include('../INC/Fonction.php');
   
    $stmt2 = get_financement_deficit();
    $stmt3 = get_totale_deficit();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Financement du deficit</h2>
    <table border=1>
        <tr>
           <th>Type de financement</th>
           <th>Montant</th>
        

        </tr>
       
       
        <?php 
        foreach ($stmt2 as $row) {?>
        <tr>
            <td>
                <?php echo $row['type_financement'];?>
            </td>
            <td><?php echo $row['montant'];?></td>
                   </tr>
       <?php }?>

       <tr>
        <td>Deficit budgetaire</td>
       <?php foreach ($stmt3 as $row) {?>
        <td><?php echo $row['total'];?></td>
      <?php }?>
       </tr>
       
    </table>    
</body>
</html>