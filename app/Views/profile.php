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
            <div class="card-header"><?= $user->username?></div>
        </div>
    </div>

    <div style="display: flex; justify-content: center;">
        <div style="min-width: 1000px;">
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
                                <input class="form-check-input" type="checkbox" name="interests[]" value="mountain_biking" id="interest1" <?= in_array('mountain_biking', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest1">Horská cyklistika</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="road_cycling" id="interest2" <?= in_array('road_cycling', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest2">Silniční cyklistika</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="bmx" id="interest3" <?= in_array('bmx', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest3">BMX</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="track_cycling" id="interest4" <?= in_array('track_cycling', $interests) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="interest4">Dráhová cyklistika</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="commuting" id="interest5" <?= in_array('commuting', $interests) ? 'checked' : ''; ?>>
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
</script>
</body>
</html>