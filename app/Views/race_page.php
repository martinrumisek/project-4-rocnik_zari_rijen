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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
<nav class="navbar bg-primary">
    <div class="container-fluid d-flex justify-content-between ">
        <a class="navbar-brand text-white" href="">
            <i class="fas fa-bicycle"></i>
        </a>
        <div class="d-flex">
            <a class="navbar-brand text-white" href="<?= base_url('graphs'); ?>">
                <i class="fas fa-chart-pie"></i>
            </a>
            <a class="navbar-brand text-white" href="<?= base_url('dashboard'); ?>">
                <i class="fas fa-square-poll-horizontal"></i>
            </a>
            <a class="navbar-brand text-white" href="<?= base_url('profile'); ?>">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </div>
</nav>

    <div class="container race-info">
        <!-- Název závodu -->
        <div class="d-flex flex-row align-items-center">
            <h1 class="m-0"><?php echo $race->default_name; ?></h1>
            <a href="<?php echo base_url('generate-pdf/'.$race->id)?>" class="text-decoration-none mx-3" target="_blank">
                <button class="btn btn-success">Show PDF <i class="fa fa-external-link fa-xs"></i></button>
            </a>
        </div>
        <table class="table table-striped" id="raceTable">
            <thead>
                <tr>
                    <th>Vlajka</th>
                    <th>Zkratka země</th>
                    <th>Rok</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop přes závody -->
                <?php foreach($race_years as $race_year) { ?>
                    <tr>
                        <td><span class="fi fi-<?php echo strtolower($race_year->country); ?>"></span></td>
                        <td><?php echo $race_year->country; ?></td>
                        <td><?php echo $race_year->year; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#raceTable');
    </script>
</body>
</html>