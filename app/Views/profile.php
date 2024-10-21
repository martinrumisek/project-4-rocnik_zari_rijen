<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="<?= base_url('vendor/tinymce/tinymce/tinymce.min.js'); ?>"></script>
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
    <nav class="navbar bg-primary">
        <div class="container-fluid d-flex justify-content-between ">
            <a class="navbar-brand text-white" href="<?= base_url();?>">
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
    
    <div class="d-flex flex-wrap mt-4 container">
        <div class="col-12 col-md-2 d-flex justify-content-center align-items-center mb-3 mb-md-0">
            <i class="fa-solid fa-user h1 "></i>
        </div>
        <div class="col-12 col-md-2 d-flex align-items-center justify-content-center mb-3 mb-md-0">
            <p class="h3 text-center"><?=$user->username?></p>
        </div>
        <div class="col-12 offset-md-3 col-md-5">
            <h3>Zájmy:</h3>
            <?php if (!empty($interests)): ?>
                <ul>
                    <?php foreach ($interests as $interest): ?>
                        <li><?= htmlspecialchars($interest); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Uživatel nemá žádné zájmy.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="container mt-3">
        <div>
            <h3 class="m-3">Popis uživatele</h3>
            <?=$user->description?>
        </div>
    </div>
    <div class="d-flex justify-content-center"><button id="showFormButton" class="btn btn-primary">Upravit text/zájmy</button>
    </div>
    <div class="container" id="userForm" style="display: none;">
        <div style="width: 100%;">
            <label for="exampleTextarea" class="form-label mt-4">Info o uživateli</label>
            <form method="POST" action="<?= base_url('saveDescription/'. $user->id); ?>">
                <textarea id="myTextarea" name="description"><?=$user->description?></textarea>
                <div class="mb-3">
                    <label for="interests" class="form-label">Zájmy v cyklistice:</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Vyberte zájmy
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Horská cyklistika" id="interest1" <?= in_array('Horská cyklistika', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest1">Horská cyklistika</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Silniční cyklistika" id="interest2" <?= in_array('Silniční cyklistika', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest2">Silniční cyklistika</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="BMX" id="interest3" <?= in_array('BMX', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest3">BMX</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Dráhová cyklistika" id="interest4" <?= in_array('Dráhová cyklistika', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest4">Dráhová cyklistika</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Dojíždění na kole" id="interest5" <?= in_array('Dojíždění na kole', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest5">Dojíždění na kole</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Uložit</button>
            </form>
        </div>
    </div>
    <script>
    tinymce.init({
        selector: '#myTextarea'
    });
    document.getElementById('showFormButton').addEventListener('click', function() {
        var formContainer = document.getElementById('userForm');
        var showButton = document.getElementById('showFormButton');
        formContainer.style.display = 'block';
        showButton.style.display = 'none';
    });
</script>
</body>
</html>