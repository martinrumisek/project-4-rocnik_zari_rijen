<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="<?= base_url('vendor/tinymce/tinymce/tinymce.min.js'); ?>"></script>
    <title>All races (závody)</title>
    <style>
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
            margin-bottom: 0; /* Remove margin to place the search bar directly under */
        }
        .navbar-brand i {
            color: white;
        }
        .col-md-4 {
            padding-left: 5px;
            padding-right: 5px;
        }
        .search-bar {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .btn-details:hover{
            width: 85%!important;
            transition: 0.3s;
            transition-timing-function: ease;
        }
        .btn-details{
            width: 75%!important;
            transition: 0.3s;
            transition-timing-function: ease;
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

<div class="search-bar">
    <div class="container d-flex justify-content-between">
        <input type="text" id="raceFilter" name="" placeholder="Hledejte podle názvu..." class="form-control" style="width: 300px;" />
        <a href="<?= base_url('export'); ?>" class="btn btn-success">Excel - export</a>
    </div>
</div>

<div class="container py-4">
    <div class="row d-flex justify-content-center" id="raceCards">
        <?php foreach($races as $race) { ?>
            <div class="card m-1 race-card" style="width: 18rem; min-height: 12rem">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <span class="card-title text-center fs-5 fw-normal m-0" style="display: inline-block; vertical-align: middle;">
                            <?php echo $race->default_name; ?>
                        </span>
                    </div>
                    
                    <div class="mt-auto w-100 d-flex flex-column justify-content-center">
                        <!--
                            <a href="<?php echo base_url('generate-pdf/'.$race->id)?>" class="d-flex justify-content-center text-decoration-none w-100 p-1 button-right" target="_blank">
                                Show PDF <i class="fa fa-external-link fa-xs px-1 py-2"></i>
                            </a>
                        -->
                        <a href="<?php echo base_url('race/'.$race->id)?>" class="d-flex justify-content-center text-decoration-none w-100 p-1 button-left">
                            <button class="btn w-75 btn-primary btn-details">Details</button>
                        </a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
    <ul class="pagination">
        <?php if (isset($pager) && $pager): ?>
            <?php echo $pager->links();?>
        <?php endif; ?>
    </ul>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterInput = document.getElementById('raceFilter');
    const raceCardsContainer = document.getElementById('raceCards');
    const pagination = document.querySelector('.pagination'); // Získání paginace

    filterInput.addEventListener('input', function() {
        const filterValue = filterInput.value;

        // Odeslání AJAX požadavku
        fetch(`<?php echo base_url('filter'); ?>?filter=${filterValue}`)
            .then(response => response.text())
            .then(data => {
                raceCardsContainer.innerHTML = data; // Aktualizuj pouze karty závodů
                pagination.style.display = filterValue ? 'none' : ''; // Skrytí paginace při aktivním filtru
            })
            .catch(error => console.error('Error:', error));
    });
});
</script>
</body>
</html>
