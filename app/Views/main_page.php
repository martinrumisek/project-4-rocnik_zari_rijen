<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>All races (závody)</title>
    <style>
        .card {
            width: 20rem;
            height: 22rem;
            margin: auto;
        }
        .card-body {
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .page-item {
            margin: 0 5px;
        }
        .page-link {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }
        .navbar {
            background-color: #007bff;
            margin-bottom: 20px;
        }
        .navbar-brand i {
            color: white;
        }
        .col-md-4 {
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-bicycle"></i>
            </a>
            <a class="navbar-brand" href="#">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <?php foreach($races as $race) { ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php echo base_url('race/'.$race->id)?>" class="text-decoration-none">
                                    <?php echo $race->default_name; ?>
                                </a>
                            </h5>
                            <p class="card-text">
                                Datum: <?php echo isset($race->race_date) ? $race->race_date : 'Datum není dostupné'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <nav>
            <ul class="pagination">
                <?php echo $pager->links(); ?>
            </ul>
        </nav>
    </div>

</body>
</html>
