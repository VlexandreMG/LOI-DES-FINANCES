<?php 
include('../INC/Fonction.php');
$rfi = get_rfi();
$total_2024 = get_total_recettes('Recettes fiscales intérieures', 2024);
$total_2025 = get_total_recettes('Recettes fiscales intérieures', 2025);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes fiscales</title>
</head>
<body>
    <div>
        <canvas id="recettesFiscalesChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const total24 = <?php echo $total_2024; ?>;
        const total25 = <?php echo $total_2025; ?>;

        const maxtotal = Math.max(total24, total25);
        const maxTotalCeil = Math.ceil(maxtotal*1.2);

        const ctx = document.getElementById('recettesFiscalesChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels:['2024', '2025'],
                datasets: [{
                    label: 'Evolution des recettes fiscales et douanières',
                    data: [total24, total25],
                    borderWidth:1
                }]
            },
            options: {
                scales:{
                    y: {
                        beginAtZero: true,
                        suggestedMax: maxTotalCeil,
                        ticks : {
                            stepSize:1000,
                            callback: function(value) {
                                return value.toLocaleString() + ' Md';
                            }
                        }
                    }
                } 
            }
        }); 
    </script>

    <table>
        <tr>
        <th>Nature d'impôts</th>
        <th>LFR 2024</th>
        <th>LFR 2025</th>
        </tr>

        <?php foreach ($rfi as $value) { ?>
        <tr>
            <td><?php echo $value['nature_impots'] ?></td>
            <td><?php echo $value['LFR2024'] ?></td>
            <td><?php echo $value['LFR2025']?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>