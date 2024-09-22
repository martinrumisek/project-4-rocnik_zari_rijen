<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Flag Icons CSS from https://flagicons.lipis.dev/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.7.0/css/flag-icons.min.css"/>
    <title>Race (závod) - <?php echo $race->default_name;?></title>
    <style>
        .race-info {
            margin-top: 20px;
        }
        .race-country {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .race-country .fi {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container race-info">
        <!-- Název závodu -->
        <h1><?php echo $race->default_name; ?></h1>

        <table class="table">
            <tbody>
                <!-- Loop přes závody -->
                <?php foreach($race_years as $race_year) { ?>
                    <tr>
                        <td>
                            <div class="race-country">
                                <span class="fi fi-<?php echo strtolower($race_year->country); ?>"></span> <!-- Vlajka podle zkratky země -->
                                <span><?php echo $race_year->country; ?> - Rok: <?php echo $race_year->year; ?></span>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>