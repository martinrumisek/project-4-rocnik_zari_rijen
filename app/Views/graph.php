<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Graph</title>
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
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('/');?>">
                <i class="fas fa-bicycle"></i>
            </a>
            <a class="navbar-brand" href="<?php echo base_url('profile');?>">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </nav>

    <main class="text-center">
        <h1>Interesting Graphs</h1>
        <p>These are some interesting graphs that use data from our special cycling database</p>
        <div class="pt-3">
            <span class="fs-4">Number of Races in Recorded Years</span>
            <div class="d-flex justify-content-center">
                <canvas id="raceCountChart" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>
        <div class="py-3">
            <span class="fs-4">Participation by Sex</span>
            <div class="d-flex justify-content-center">
                <canvas id="raceGenderChart" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>
        
    <script>
    
    var xValues = [];
    var yValues = [];
    var barColors = "rgba(0,123,255,1.0)";

    <?php foreach($races as $race_year => $race_count)
    {
        echo 'xValues.push("'.$race_year.'");';
        echo 'yValues.push("'.$race_count.'");';
    }?>

    new Chart("raceCountChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        }
    }
    });

    xValues = ['Men', 'Women'];
    yValues = ['<?=$menRaces?>', <?=$womenRaces?>];
    var barColors = [
        "#8eaebd",
        "#fea1de",
    ];

    new Chart("raceGenderChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
  }
});
    </script>
    </main>
</body>
</html>