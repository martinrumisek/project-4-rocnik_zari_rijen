<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Nalinkoval jsem tady i bootstrap (jak css tak i javascript) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Race - <?php echo $race->default_name;?></title>
</head>
<body>
    <!-- Ukázka loopu pro druhou stránku
     tato stránka používá tabulku 'race_year'
     ale jinak by to mělo být stejné 
     
     Jen mě napadá, kdybys pak v té tabulce to
     chtěl očíslovat, tak ten loop musíš upravit
     abys tam měl i $key (aka pokolikáté už loop
     jede) to by mělo vypadat takto:
     
     foreach($race_years as $key => $race_year)

     no a pak v php jenom klasicky echo $key; 
     
     Není to potřeba, takže to nechám na tobě -->
    <?php foreach($race_years as $race_year) { ?>
        <!-- Asi k tomu nemám co víc dodat -->
        <div>
            <?php echo $race_year->real_name;?>
        </div>
    <?php } ?>
</body>
</html>