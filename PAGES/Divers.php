<?php 
    include('../INC/Fonction.php');
    $stmt = get_theme();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divers</title>
</head>
<body>

   <ul>
    <?php 
    foreach ($stmt as $row) {?>
        <li><a href="types.php?theme_no=<?php echo $row['id'];?>"><?php echo $row['nom'];?></a></li>
    <?php   }
    ?>

   </ul>
    
</body>
</html>