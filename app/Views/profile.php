<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Profile</title>
    <style>
        .navbar {
            background-color: #007bff;
            margin-bottom: 20px;
        }
        .navbar-brand i {
            color: white;
        }
    </style>
</head>
<body>
    <!-- Ještě se sem neposílá uživatelské jméno atd. první musím udělat filtr a s tím související věci -->
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

    <div class="" style="width: 1000px;  display: flex; justify-content: left; margin: 70px auto;">
        <div class="card border-primary" style="width: 370px; display: flex; justify-content: left;">
            <div class="card-header">Jméno uživatele</div>
        </div>
    </div>

    <div style="display: flex; justify-content: center;">
        <div style="min-width: 1000px;">
            <label for="exampleTextarea" class="form-label mt-4">Info o uživateli</label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
        </div>
    </div>

    <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="display: flex; justify-content: center; margin: 12px auto; background-color: white; border: 2px solid blue; width: 25%;">
        <button type="button" class="btn btn-primary">Primary</button>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Dropdown link</a>
                <a class="dropdown-item" href="#">Dropdown link</a>
            </div>
        </div>
    </div>

</body>
</html>