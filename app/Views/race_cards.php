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