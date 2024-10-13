<?php foreach($races as $race) { ?>
    <div class="card m-1 race-card" style="height: 130px">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $race->default_name; ?>
            </h5>
            <p class="card-text">
                <a href="<?php echo base_url('race/'.$race->id)?>" class="text-decoration-none">
                    Více informací o závodu
                </a>
                <br>
                <a href="<?php echo base_url('generate-pdf/'.$race->id)?>" class="text-decoration-none" target="_blank">
                    Zobrazit v PDF
                </a>
            </p>
        </div>
    </div>
<?php } ?>