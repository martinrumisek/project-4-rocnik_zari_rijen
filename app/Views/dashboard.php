<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        button{
            width: 80px;
            margin: 1px;
        }
        .navbar {
            background-color: #007bff;
            margin-bottom: 20px;
        }
        .navbar-brand i {
            color: white;
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

    <main>
        <div class="mx-5">
            <h1 class="w-100" style="text-align: center;">Dashboard</h1>
            <div class="pb-1">
                <h2>New Race</h2>
                <span>To add a new race to the database you must fill in the form: </span>
                <a href="<?=base_url('race/new');?>">
                    <button class="btn btn-success">New</button>
                </a>
            </div>
            <h2>All Races</h2>
            <table class="table table-striped">
                <tr>
                    <th>ID</th><th>Name</th><th>Link</th><th>Country</th><th>Type</th><th>Change</th>
                </tr>
                <?php foreach ($races as $key => $race)
                {
                    echo '<tr><td>'.$race->id.'</td><td>'.$race->default_name.'<a class="px-1" href="'.base_url('race/'.$race->id).'"><i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></a></td><td>'.$race->link.'</td><td>'.$race->country.'</td><td>'.$race->type.'</td><td><a href="'.base_url('race/edit/'.$race->id).'"><button class="btn btn-warning">Edit</button></a><a href="'.base_url('race/delete/'.$race->id).'"><button class="btn btn-danger">Delete</button></a></td></tr>';    
                } ?>
            </table>
            <ul class="pagination">
                <?php if (isset($pager) && $pager): ?>
                    <?php echo $pager->links();?>
                <?php endif; ?>
            </ul>
        </div>
    </main>
</body>
</html>