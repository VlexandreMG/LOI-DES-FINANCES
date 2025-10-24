<?php  include('../INC/Fonction.php');
   
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
    
<h1>Déficit</h1>
<ul><li><a href="Prev_def.php">Prévision du déficit budgetaire</a></li>
<li><a href="Finan_def.php">Financement du déficit</a></li></ul>
   
    
</body>
</html>