<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Nalinkoval jsem tady i bootstrap (jak css tak i javascript) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>All races (závody)</title>
</head>
<body>
    <!-- Ukázka loopu který projde proměnnou races
     Ta obsahuje pole objektů vytažené z databáze
     Tento loop se spustí pro každý závod
     Vždy se jen "změní" proměnná $race,
     která má "aktuální" závod pro zobrazení
     Takže de facto část kódu mezi { a } se
     spustí několikrát, ale $race bude mít vždy
     jiná data - ta která má zrovna zobrazit -->
    <?php foreach($races as $race) { ?>
        <!-- Uvnitř loopu můžeš používat html kód
         protože jsem ukončil ?php, kdybys ho 
         neukončil, tak musíš používat echo a to
         je asi víc matoucí
         Každopádně k proměnné se dostaneš v php
         pomocí $race->nazev_sloupce_z_databaze 
         (tady používáme tabulku 'race')
         + zde je menší ukázka i s proklikem -->
        <div>
            <a href="<?php echo base_url('race/'.$race->id)?>">
                <?php echo $race->default_name;?>
            </a>
        </div>
    <?php } ?>

    <!-- Tady se vypíše pager
     Asi by bylo lepší ho nějak bootstrapem zlepšit,
     ale nejsem expert
     Každopádně kdyby ti nevyhovoval počet závodů
     na jedné stránce, tak v controlleru Home, metodě
     index přepiš parametr metody paginate(20) na jiné 
     číslo -->
    <?php echo $pager->links();?>

    <!-- Potom ještě něco, co by se ti mohlo hodit
     je routa na profil
     Tu v php zobrazíš takto:

    echo base_url('profile');

    a pak ji napasuješ do atributu href u <a>
    -->
    <a href="app/Views/test_page.php">tady</a>
</body>
</html>