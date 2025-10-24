<?php 
include('../INC/Fonction.php');
$theme_no = $_GET['theme_no'];
$type = get_type_by_no($theme_no);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach ($type as $row) {?>
            <li><a href="tableaux.php?tab_id=<?php echo $row['id'] ;?>"><?php echo $row['nom'] ;?></a></li>
       <?php  } ?>

    </ul>
</body>
</html>